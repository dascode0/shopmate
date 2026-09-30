<?php

namespace App\Http\Controllers;

use App\Models\Tenant\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::withCount('products')
            ->latest()
            ->get();

        return view('category.index', [
            'categories' => $categories,
            'totalCategories' => $categories->count(),
            'activeCategories' => $categories->where('status', true)->count(),
            'inactiveCategories' => $categories->where('status', false)->count(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'status' => ['required', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);

        $baseSlug = Str::slug($validated['name']) ?: 'category';
        $slug = $baseSlug;
        $suffix = 2;

        while (Category::where('slug', $slug)->exists()) {
            $slug = $baseSlug.'-'.$suffix;
            $suffix++;
        }

        $imagePath = $request->file('image')?->store('categories', 'public');

        Category::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'image_path' => $imagePath,
            'sort_order' => $validated['order'] ?? 0,
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'status' => ['required', 'boolean'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'order' => ['nullable', 'integer', 'min:0'],
            '_edit_category_id' => ['required', 'integer', 'in:'.$category->id],
        ]);

        $baseSlug = Str::slug($validated['name']) ?: 'category';
        $slug = $baseSlug;
        $suffix = 2;

        while (
            Category::where('slug', $slug)
                ->where('id', '!=', $category->getKey())
                ->exists()
        ) {
            $slug = $baseSlug.'-'.$suffix;
            $suffix++;
        }

        $previousImagePath = $category->image_path;
        $newImagePath = $request->file('image')?->store('categories', 'public');
        $category->name = $validated['name'];
        $category->slug = $slug;
        $category->description = $validated['description'] ?? null;
        $category->sort_order = $validated['order'] ?? 0;
        $category->status = $validated['status'];
        if ($newImagePath) {
            $category->image_path = $newImagePath;
        }
        $category->save();

        if ($newImagePath && $previousImagePath) {
            Storage::disk('public')->delete($previousImagePath);
        }

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);

        if ($category->products()->exists()) {
            return redirect()
                ->route('categories.index')
                ->with('error', 'This category cannot be deleted while it has products. Move or remove its products first.');
        }

        $imagePath = $category->image_path;
        $category->delete();

        if ($imagePath) {
            Storage::disk('public')->delete($imagePath);
        }

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
