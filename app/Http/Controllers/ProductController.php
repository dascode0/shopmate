<?php

namespace App\Http\Controllers;

use App\Models\Tenant\Category;
use App\Models\Tenant\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::with([
            'category',
            'productImages' => fn ($query) => $query->orderBy('sort_order'),
        ])->latest()->get();
        $totalProducts = $products->count();

        return view('product.index', [
            'products' => $products,
            'categories' => Category::orderBy('name')->get(),
            'totalProducts' => $totalProducts,
            'activeProducts' => $products->where('status', true)->count(),
            'lowStockProducts' => $products
                ->filter(fn (Product $product) => $product->stock_quantity > 0
                    && $product->stock_quantity <= $product->low_stock_threshold)
                ->count(),
            'outOfStockProducts' => $products->where('stock_quantity', 0)->count(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate($this->rules());
        $imagePaths = $this->storeImages($request);

        try {
            DB::connection('tenant')->transaction(function () use ($validated, $imagePaths): void {
                $product = Product::create([
                    ...$this->productAttributes($validated),
                    'slug' => $this->uniqueSlug($validated['name']),
                ]);

                foreach ($imagePaths as $sortOrder => $imagePath) {
                    $product->productImages()->create([
                        'image_path' => $imagePath,
                        'sort_order' => $sortOrder,
                    ]);
                }
            });
        } catch (\Throwable $exception) {
            $this->deleteStoredImages($imagePaths);
            throw $exception;
        }

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $validated = $request->validate([
            ...$this->rules(),
            '_edit_product_id' => ['required', 'integer', Rule::in([$product->id])],
            'delete_image_ids' => ['nullable', 'array'],
            'delete_image_ids.*' => ['integer', 'distinct'],
            'image_order' => ['nullable', 'array'],
            'image_order.*' => ['required', 'string', 'regex:/^(existing|new):\d+$/', 'distinct'],
        ]);
        $deleteImageIds = $validated['delete_image_ids'] ?? [];
        if ($product->productImages()->whereIn('id', $deleteImageIds)->count() !== count($deleteImageIds)) {
            throw ValidationException::withMessages([
                'delete_image_ids' => 'One or more selected images do not belong to this product.',
            ]);
        }

        $imageOrder = $validated['image_order'] ?? [];
        $this->validateImageOrder($product, $deleteImageIds, $imageOrder, count($request->file('images', [])));
        $imagePaths = $this->storeImages($request);

        try {
            $removedImagePaths = DB::connection('tenant')->transaction(function () use (
                $product,
                $validated,
                $deleteImageIds,
                $imageOrder,
                $imagePaths
            ): array {
                $imagesToDelete = $product->productImages()
                    ->whereIn('id', $deleteImageIds)
                    ->get();
                if ($imagesToDelete->count() !== count($deleteImageIds)) {
                    throw ValidationException::withMessages([
                        'delete_image_ids' => 'One or more selected images do not belong to this product.',
                    ]);
                }
                $this->validateImageOrder($product, $deleteImageIds, $imageOrder, count($imagePaths));

                $product->fill([
                    ...$this->productAttributes($validated),
                    'slug' => $this->uniqueSlug($validated['name'], $product->id),
                ])->save();

                $removedImagePaths = $imagesToDelete->pluck('image_path')->all();
                foreach ($imagesToDelete as $image) {
                    $image->delete();
                }

                foreach ($imageOrder as $sortOrder => $imageReference) {
                    [$type, $id] = explode(':', $imageReference, 2);
                    if ($type === 'existing') {
                        $product->productImages()
                            ->whereKey((int) $id)
                            ->update(['sort_order' => $sortOrder]);

                        continue;
                    }

                    $product->productImages()->create([
                        'image_path' => $imagePaths[(int) $id],
                        'sort_order' => $sortOrder,
                    ]);
                }

                return $removedImagePaths;
            });
        } catch (\Throwable $exception) {
            $this->deleteStoredImages($imagePaths);
            throw $exception;
        }

        $this->deleteStoredImages($removedImagePaths);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    private function validateImageOrder(Product $product, array $deleteImageIds, array $imageOrder, int $uploadedImageCount): void
    {
        $remainingImageIds = $product->productImages()
            ->whereNotIn('id', $deleteImageIds)
            ->pluck('id')
            ->map(fn ($id) => (string) $id)
            ->all();
        $orderedExistingIds = [];
        $orderedNewIndexes = [];

        foreach ($imageOrder as $reference) {
            [$type, $id] = explode(':', $reference, 2);
            if ($type === 'existing') {
                $orderedExistingIds[] = $id;
            } else {
                $orderedNewIndexes[] = (int) $id;
            }
        }

        sort($remainingImageIds);
        sort($orderedExistingIds);
        sort($orderedNewIndexes);
        $expectedNewIndexes = $uploadedImageCount > 0 ? range(0, $uploadedImageCount - 1) : [];

        if ($orderedExistingIds !== $remainingImageIds || $orderedNewIndexes !== $expectedNewIndexes) {
            throw ValidationException::withMessages([
                'image_order' => 'The product image order is invalid. Please arrange the images again and retry.',
            ]);
        }
    }

    private function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer', Rule::exists('tenant.categories', 'id')],
            'description' => ['nullable', 'string', 'max:2000'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'low_stock_threshold' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'boolean'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }

    private function storeImages(Request $request): array
    {
        $imagePaths = [];

        foreach ($request->file('images', []) as $image) {
            $imagePath = $image->store('products', 'public');
            if (! $imagePath) {
                $this->deleteStoredImages($imagePaths);
                throw ValidationException::withMessages([
                    'images' => 'One or more product images could not be saved. Please try again.',
                ]);
            }

            $imagePaths[] = $imagePath;
        }

        return $imagePaths;
    }

    private function deleteStoredImages(array $imagePaths): void
    {
        foreach ($imagePaths as $imagePath) {
            if ($imagePath && ! Storage::disk('public')->delete($imagePath)) {
                throw new \RuntimeException("Unable to remove product image [{$imagePath}].");
            }
        }
    }

    private function productAttributes(array $validated): array
    {
        return [
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'stock_quantity' => $validated['stock_quantity'],
            'low_stock_threshold' => $validated['low_stock_threshold'],
            'status' => $validated['status'],
        ];
    }

    private function uniqueSlug(string $name, ?int $exceptId = null): string
    {
        $baseSlug = Str::slug($name) ?: 'product';
        $slug = $baseSlug;
        $suffix = 2;

        while (
            Product::where('slug', $slug)
                ->when($exceptId, fn ($query) => $query->where('id', '!=', $exceptId))
                ->exists()
        ) {
            $slug = $baseSlug.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }

    public function destroy(int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $imagePaths = $product->productImages()->pluck('image_path')->all();

        DB::connection('tenant')->transaction(function () use ($product): void {
            $product->productImages()->delete();
            $product->delete();
        });

        $this->deleteStoredImages($imagePaths);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }

    public function get_products(String $shop_key)
    {
        $user = User::where('shop_key', $shop_key)->first();
        if (!$user) {
            return response()->json(['error' => 'Invalid shop key'], 404);
        }

        $company = $user->company;
        $databaseName = $company->database_name;
        // Set the tenant database connection
        config(['database.connections.tenant.database' => $databaseName]);
        // Now you can query the products from the tenant database
        $products = Product::with('productImages')->get();
        return response()->json($products);

    }

    public function get_product(String $shop_key, int $product_id)
    {
        $user = User::where('shop_key', $shop_key)->first();
        if (!$user) {
            return response()->json(['error' => 'Invalid shop key'], 404);
        }

        $company = $user->company;
        $databaseName = $company->database_name;
        // Set the tenant database connection
        config(['database.connections.tenant.database' => $databaseName]);
        // Now you can query the product from the tenant database
        $product = Product::with('productImages')->find($product_id);
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        return response()->json($product);
    }
}
