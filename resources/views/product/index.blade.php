@extends('layouts.dashboard')

@section('title', 'Products')
@section('page-title', 'Products')

@section('content')

<style>
    .product-page {
        width: 100%;
    }

    .page-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 24px;
    }

    .page-header h2 {
        margin: 0 0 6px;
        font-size: 24px;
        font-weight: 700;
        color: #17221c;
    }

    .page-header p {
        margin: 0;
        color: #748078;
        font-size: 14px;
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 18px;
        background: #16865c;
        color: #fff;
        border: 0;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-primary:hover {
        background: #116f4b;
    }

    /* Stats */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 22px;
    }

    .stat-card {
        background: #fff;
        border: 1px solid #e7ece9;
        border-radius: 12px;
        padding: 18px;
    }

    .stat-label {
        color: #78837d;
        font-size: 13px;
        margin-bottom: 8px;
    }

    .stat-value {
        color: #17221c;
        font-size: 25px;
        font-weight: 700;
    }

    .stat-sub {
        margin-top: 5px;
        font-size: 12px;
        color: #16865c;
    }

    .stat-sub.warning {
        color: #c88719;
    }

    /* Main card */

    .products-card {
        background: #fff;
        border: 1px solid #e7ece9;
        border-radius: 12px;
        overflow: hidden;
    }

    .products-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 18px;
        border-bottom: 1px solid #edf0ee;
    }

    .search-box {
        position: relative;
        width: 320px;
    }

    .search-box input {
        width: 100%;
        height: 40px;
        padding: 0 14px 0 38px;
        border: 1px solid #dfe5e1;
        border-radius: 8px;
        outline: none;
        font-size: 13px;
        box-sizing: border-box;
    }

    .search-box input:focus {
        border-color: #16865c;
    }

    .search-icon {
        position: absolute;
        left: 13px;
        top: 11px;
        color: #89938d;
        font-size: 14px;
    }

    .filter-box {
        display: flex;
        gap: 10px;
    }

    .filter-box select {
        height: 40px;
        padding: 0 12px;
        border: 1px solid #dfe5e1;
        border-radius: 8px;
        background: #fff;
        color: #4d5952;
        font-size: 13px;
        outline: none;
    }

    /* Table */

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .products-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
    }

    .products-table th {
        padding: 13px 18px;
        text-align: left;
        background: #fafcfb;
        color: #68746d;
        font-size: 12px;
        font-weight: 600;
        border-bottom: 1px solid #edf0ee;
        white-space: nowrap;
    }

    .products-table td {
        padding: 15px 18px;
        color: #354139;
        font-size: 13px;
        border-bottom: 1px solid #f0f2f1;
        vertical-align: middle;
    }

    .products-table tr:last-child td {
        border-bottom: none;
    }

    .products-table tr:hover {
        background: #fbfdfc;
    }

    .product-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .product-image {
        width: 44px;
        height: 44px;
        border-radius: 8px;
        background: #eef5f1;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #16865c;
        font-size: 18px;
        flex-shrink: 0;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        border-radius: inherit;
        object-fit: cover;
    }

    .product-name {
        font-weight: 600;
        color: #17221c;
        margin-bottom: 3px;
    }

    .product-code {
        font-size: 11px;
        color: #89938d;
    }

    .price {
        font-weight: 600;
        color: #17221c;
    }

    .stock {
        font-weight: 600;
    }

    .stock.low {
        color: #c88719;
    }

    .stock.out {
        color: #c84b4b;
    }

    .stock.good {
        color: #16865c;
    }

    .status {
        display: inline-flex;
        padding: 5px 9px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .status.active {
        background: #e7f6ee;
        color: #16865c;
    }

    .status.inactive {
        background: #f0f2f1;
        color: #707b74;
    }

    .status.draft {
        background: #fff4df;
        color: #a87312;
    }

    .actions {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .action-btn {
        width: 32px;
        height: 32px;
        border: 1px solid #e1e6e3;
        border-radius: 7px;
        background: #fff;
        color: #68746d;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        cursor: pointer;
        font-size: 13px;
    }

    .action-btn:hover {
        border-color: #16865c;
        color: #16865c;
    }

    .action-btn.delete:hover {
        border-color: #d95b5b;
        color: #d95b5b;
    }

    .product-modal {
        position: fixed;
        inset: 0;
        z-index: 1100;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background: rgba(14, 30, 23, 0.48);
    }

    .product-modal.open {
        display: flex;
    }

    .product-modal-card {
        width: min(100%, 620px);
        max-height: calc(100vh - 40px);
        overflow-y: auto;
        padding: 24px;
        border: 1px solid #e5ece9;
        border-radius: 12px;
        background: #fff;
        box-shadow: 0 18px 50px rgba(12, 39, 27, 0.2);
    }

    .product-modal-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 20px;
    }

    .product-modal-header h3 {
        margin: 0 0 5px;
        color: #17221c;
        font-size: 18px;
    }

    .product-modal-header p {
        margin: 0;
        color: #89938d;
        font-size: 12px;
    }

    .product-modal-close {
        width: 32px;
        height: 32px;
        border: 1px solid #e5ece9;
        border-radius: 7px;
        background: #fff;
        color: #68746d;
        font-size: 19px;
        cursor: pointer;
    }

    .product-form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0 14px;
    }

    .product-form-field {
        min-width: 0;
        margin-bottom: 16px;
    }

    .product-form-field.full-width {
        grid-column: 1 / -1;
    }

    .product-form-field label {
        display: block;
        margin-bottom: 7px;
        color: #354139;
        font-size: 12px;
        font-weight: 700;
    }

    .product-form-field input,
    .product-form-field textarea,
    .product-form-field select {
        width: 100%;
        min-height: 40px;
        padding: 10px 11px;
        border: 1px solid #dfe5e1;
        border-radius: 7px;
        outline: none;
        background: #fff;
        color: #354139;
        font: inherit;
        font-size: 13px;
    }

    .product-form-field textarea {
        min-height: 84px;
        resize: vertical;
    }

    .product-field-error {
        margin: 6px 0 0;
        color: #c84b4b;
        font-size: 12px;
    }

    .product-form-field input:focus,
    .product-form-field textarea:focus,
    .product-form-field select:focus {
        border-color: #16865c;
        box-shadow: 0 0 0 3px rgba(22, 134, 92, 0.1);
    }

    .product-image-preview {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 16px;
        padding: 11px;
        border: 1px solid #edf0ee;
        border-radius: 8px;
        background: #fafcfb;
    }

    .product-image-preview img,
    .product-image-placeholder {
        width: 54px;
        height: 54px;
        flex: 0 0 54px;
        border-radius: 8px;
        object-fit: cover;
    }

    .product-image-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eef5f1;
        color: #16865c;
        font-size: 19px;
    }

    .product-image-preview p {
        margin: 0;
        color: #89938d;
        font-size: 11px;
    }

    .product-image-gallery {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin: 0 0 16px;
    }

    .product-image-item {
        position: relative;
        width: 92px;
        padding: 6px;
        border: 1px solid #e5ece9;
        border-radius: 8px;
        background: #fafcfb;
        cursor: grab;
    }

    .product-image-item:active {
        cursor: grabbing;
    }

    .product-image-item.dragging {
        opacity: 0.45;
    }

    .product-image-item.drag-over {
        border-color: #16865c;
        box-shadow: 0 0 0 2px rgba(22, 134, 92, 0.14);
    }

    .product-image-item img {
        display: block;
        width: 78px;
        height: 78px;
        border-radius: 5px;
        object-fit: cover;
    }

    .product-image-item label {
        display: flex;
        align-items: center;
        gap: 4px;
        margin-top: 5px;
        color: #c84b4b;
        font-size: 11px;
        cursor: pointer;
    }

    .product-image-item input {
        margin: 0;
    }

    .product-form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 9px;
        margin-top: 6px;
    }

    .product-form-actions button {
        padding: 10px 14px;
        border: 1px solid #e0e8e3;
        border-radius: 7px;
        background: #fff;
        color: #536159;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
    }

    .product-form-actions .product-save-btn {
        border-color: #16865c;
        background: #16865c;
        color: #fff;
    }

    .product-preview-notice {
        position: fixed;
        right: 22px;
        bottom: 22px;
        z-index: 1200;
        max-width: calc(100vw - 44px);
        padding: 12px 16px;
        border-radius: 8px;
        background: #063d2d;
        color: #fff;
        box-shadow: 0 8px 24px rgba(6, 61, 45, 0.2);
        font-size: 13px;
        opacity: 0;
        pointer-events: none;
        transform: translateY(8px);
        transition: 0.2s ease;
    }

    .product-preview-notice.show {
        opacity: 1;
        transform: translateY(0);
    }

    /* Pagination */

    .table-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 18px;
        border-top: 1px solid #edf0ee;
    }

    .showing-text {
        color: #7b857f;
        font-size: 12px;
    }

    .pagination {
        display: flex;
        gap: 5px;
    }

    .page-btn {
        min-width: 32px;
        height: 32px;
        padding: 0 8px;
        border: 1px solid #dfe5e1;
        background: #fff;
        border-radius: 6px;
        color: #68746d;
        font-size: 12px;
        cursor: pointer;
    }

    .page-btn.active {
        background: #16865c;
        border-color: #16865c;
        color: #fff;
    }

    /* Responsive */

    @media (max-width: 1100px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
        }

        .btn-primary {
            width: 100%;
            justify-content: center;
        }

        .products-toolbar {
            flex-direction: column;
            align-items: stretch;
        }

        .search-box {
            width: 100%;
        }

        .filter-box {
            width: 100%;
        }

        .filter-box select {
            width: 100%;
        }

        .table-footer {
            flex-direction: column;
            gap: 12px;
            align-items: flex-start;
        }
    }

    @media (max-width: 520px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .page-header h2 {
            font-size: 21px;
        }

        .product-modal-card {
            padding: 18px;
        }

        .product-form-grid {
            grid-template-columns: 1fr;
        }

        .product-form-field.full-width {
            grid-column: auto;
        }
    }
</style>


<div class="product-page">

    {{-- Page Header --}}
    <div class="page-header">

        <div>
            <h2>Products</h2>

            <p>
                Manage your products, pricing, stock and product status.
            </p>
        </div>

        <button type="button" class="btn-primary" id="open-add-product">
            <span>+</span>
            Add Product
        </button>

    </div>


    {{-- Statistics --}}
    <div class="stats-grid">

        <div class="stat-card">
            <div class="stat-label">Total Products</div>
            <div class="stat-value">{{ $totalProducts }}</div>
            <div class="stat-sub">All products</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Active Products</div>
            <div class="stat-value">{{ $activeProducts }}</div>
            <div class="stat-sub">Currently available</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Low Stock</div>
            <div class="stat-value">{{ $lowStockProducts }}</div>
            <div class="stat-sub warning">Needs attention</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Out of Stock</div>
            <div class="stat-value">{{ $outOfStockProducts }}</div>
            <div class="stat-sub warning">Currently unavailable</div>
        </div>

    </div>


    {{-- Products Table --}}
    <div class="products-card">

        {{-- Toolbar --}}
        <div class="products-toolbar">

            <div class="search-box">

                <span class="search-icon">⌕</span>

                <input
                    type="text"
                    placeholder="Search products..."
                    id="product-search"
                >

            </div>


            <div class="filter-box">

                <select id="product-category-filter">
                    <option value="">All Categories</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                <select id="product-status-filter">
                    <option value="">All Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>

            </div>

        </div>


        {{-- Table --}}
        <div class="table-wrapper">

            <table class="products-table">

                <thead>

                    <tr>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>

                </thead>


                <tbody>

                    @forelse ($products as $product)
                    @php
                        $productImage = $product->productImages->first();
                        $stockClass = $product->stock_quantity === 0
                            ? 'out'
                            : ($product->stock_quantity <= $product->low_stock_threshold ? 'low' : 'good');
                    @endphp
                    <tr
                        class="product-row"
                        data-search="{{ strtolower($product->name . ' ' . $product->slug . ' ' . ($product->category?->name ?? '')) }}"
                        data-category="{{ $product->category_id }}"
                        data-status="{{ $product->status ? '1' : '0' }}">
                        <td>
                            <div class="product-info">
                                <div class="product-image">
                                    @if ($productImage)
                                    <img src="{{ asset('storage/' . ltrim($productImage->image_path, '/')) }}" alt="{{ $product->name }}">
                                    @else
                                    ◈
                                    @endif
                                </div>
                                <div>
                                    <div class="product-name">{{ $product->name }}</div>
                                    <div class="product-code">{{ $product->slug }}</div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $product->category?->name ?? '—' }}</td>
                        <td class="price">₹{{ number_format((float) $product->price, 2) }}</td>
                        <td class="stock {{ $stockClass }}">{{ $product->stock_quantity }}</td>
                        <td>
                            <span class="status {{ $product->status ? 'active' : 'inactive' }}">
                                {{ $product->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $product->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="actions">
                                <button
                                    type="button"
                                    class="action-btn edit-product-btn"
                                    aria-label="Edit {{ $product->name }}"
                                    data-product-id="{{ $product->id }}"
                                    data-update-url="{{ route('products.update', $product->id) }}"
                                    data-name="{{ $product->name }}"
                                    data-description="{{ $product->description }}"
                                    data-category-id="{{ $product->category_id }}"
                                    data-price="{{ $product->price }}"
                                    data-stock="{{ $product->stock_quantity }}"
                                    data-low-stock-threshold="{{ $product->low_stock_threshold }}"
                                    data-status="{{ $product->status ? '1' : '0' }}"
                                    data-images="{{ $product->productImages->map(fn ($image) => ['id' => $image->id, 'url' => asset('storage/' . ltrim($image->image_path, '/'))])->values()->toJson() }}">✎</button>

                                <button
                                    type="button"
                                    class="action-btn delete-product-btn"
                                    aria-label="Delete {{ $product->name }}"
                                    data-delete-url="{{ route('products.destroy', $product->id) }}"
                                    onclick="if (confirm('Are you sure you want to delete this product?')) { window.location.href = this.dataset.deleteUrl; }">🗑</button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr class="product-empty-row">
                        <td colspan="7">No products saved yet. Select “Add Product” to create your first one.</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>


        {{-- Footer --}}
        <div class="table-footer">

            <div class="showing-text" id="product-showing-count">
                Showing <strong>{{ $products->count() }}</strong> of <strong>{{ $totalProducts }}</strong> products
            </div>

        </div>

    </div>

</div>

@if (session('success'))
<div class="product-preview-notice show" role="status">{{ session('success') }}</div>
@endif

<div class="product-modal {{ $errors->any() && !old('_edit_product_id') ? 'open' : '' }}" id="add-product-modal" aria-hidden="{{ $errors->any() && !old('_edit_product_id') ? 'false' : 'true' }}">
    <section class="product-modal-card" role="dialog" aria-modal="true" aria-labelledby="add-product-title">
        <div class="product-modal-header">
            <div>
                <h3 id="add-product-title">Add Product</h3>
                <p>Add product details, pricing, stock and status.</p>
            </div>
            <button type="button" class="product-modal-close" data-close-product-modal="add-product-modal" aria-label="Close form">&times;</button>
        </div>

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            @if ($errors->any() && !old('_edit_product_id'))
            <div class="product-field-error" role="alert">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
            <div class="product-image-preview">
                <p>Select one or more product images.</p>
            </div>
            <div class="product-image-gallery" id="add-product-image-gallery"></div>

            <div class="product-form-grid">
                <div class="product-form-field">
                    <label for="add-product-name">Product name *</label>
                    <input id="add-product-name" name="name" type="text" value="{{ old('name') }}" maxlength="255" required placeholder="e.g. Wireless Headphones">
                </div>
                <div class="product-form-field">
                    <label for="add-product-low-stock-threshold">Low stock threshold *</label>
                    <input id="add-product-low-stock-threshold" name="low_stock_threshold" type="number" value="{{ old('low_stock_threshold', 5) }}" min="0" step="1" required>
                </div>
                <div class="product-form-field">
                    <label for="add-product-category">Category *</label>
                    <select id="add-product-category" name="category_id" required>
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="product-form-field">
                    <label for="add-product-status">Status</label>
                    <select id="add-product-status" name="status" required>
                        <option value="1" {{ old('status', '1') === '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="product-form-field">
                    <label for="add-product-price">Selling price (₹) *</label>
                    <input id="add-product-price" name="price" type="number" value="{{ old('price') }}" min="0" step="0.01" required placeholder="0.00">
                </div>
                <div class="product-form-field">
                    <label for="add-product-stock">Stock quantity *</label>
                    <input id="add-product-stock" name="stock_quantity" type="number" value="{{ old('stock_quantity', 0) }}" min="0" step="1" required placeholder="0">
                </div>
                <div class="product-form-field full-width">
                    <label for="add-product-images">Product images</label>
                    <input id="add-product-images" name="images[]" type="file" accept="image/*" multiple>
                </div>
                <div class="product-form-field full-width">
                    <label for="add-product-description">Description</label>
                    <textarea id="add-product-description" name="description" maxlength="2000" placeholder="Describe the product">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="product-form-actions">
                <button type="button" data-close-product-modal="add-product-modal">Cancel</button>
                <button type="submit" class="product-save-btn">Save Product</button>
            </div>
        </form>
    </section>
</div>

<div class="product-modal {{ old('_edit_product_id') ? 'open' : '' }}" id="edit-product-modal" aria-hidden="{{ old('_edit_product_id') ? 'false' : 'true' }}">
    <section class="product-modal-card" role="dialog" aria-modal="true" aria-labelledby="edit-product-title">
        <div class="product-modal-header">
            <div>
                <h3 id="edit-product-title">Edit Product</h3>
                <p>Update the product details, pricing, stock and status.</p>
            </div>
            <button type="button" class="product-modal-close" data-close-product-modal="edit-product-modal" aria-label="Close form">&times;</button>
        </div>

        <form method="POST" action="#" enctype="multipart/form-data" id="edit-product-form">
            @csrf
            @method('PUT')
            <input type="hidden" name="_edit_product_id" id="edit-product-id" value="{{ old('_edit_product_id') }}">
            @if ($errors->any() && old('_edit_product_id'))
            <div class="product-field-error" role="alert">
                @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif
            <div class="product-image-preview">
                <p>Drag images to change their order. Mark any image to remove, or add more images below.</p>
            </div>
            <div class="product-image-gallery" id="edit-product-existing-images"></div>
            <div class="product-image-gallery" id="edit-product-new-images"></div>

            <div class="product-form-grid">
                <div class="product-form-field">
                    <label for="edit-product-name">Product name *</label>
                    <input id="edit-product-name" name="name" type="text" value="{{ old('name') }}" maxlength="255" required>
                </div>
                <div class="product-form-field">
                    <label for="edit-product-low-stock-threshold">Low stock threshold *</label>
                    <input id="edit-product-low-stock-threshold" name="low_stock_threshold" type="number" value="{{ old('low_stock_threshold', 5) }}" min="0" step="1" required>
                </div>
                <div class="product-form-field">
                    <label for="edit-product-category">Category *</label>
                    <select id="edit-product-category" name="category_id" required>
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="product-form-field">
                    <label for="edit-product-status">Status</label>
                    <select id="edit-product-status" name="status" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <div class="product-form-field">
                    <label for="edit-product-price">Selling price (₹) *</label>
                    <input id="edit-product-price" name="price" type="number" value="{{ old('price') }}" min="0" step="0.01" required>
                </div>
                <div class="product-form-field">
                    <label for="edit-product-stock">Stock quantity *</label>
                    <input id="edit-product-stock" name="stock_quantity" type="number" value="{{ old('stock_quantity') }}" min="0" step="1" required>
                </div>
                <div class="product-form-field full-width">
                    <label for="edit-product-images">Add images</label>
                    <input id="edit-product-images" name="images[]" type="file" accept="image/*" multiple>
                </div>
                <div class="product-form-field full-width">
                    <label for="edit-product-description">Description</label>
                    <textarea id="edit-product-description" name="description" maxlength="2000" placeholder="Describe the product">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="product-form-actions">
                <button type="button" data-close-product-modal="edit-product-modal">Cancel</button>
                <button type="submit" class="product-save-btn">Save Changes</button>
            </div>
        </form>
    </section>
</div>

<script>
    (() => {
        const addModal = document.getElementById('add-product-modal');
        const editModal = document.getElementById('edit-product-modal');
        let activeTrigger = null;

        const openModal = (modal) => {
            activeTrigger = document.activeElement;
            modal.classList.add('open');
            modal.setAttribute('aria-hidden', 'false');
            modal.querySelector('input:not([type="file"]):not([type="hidden"])').focus();
        };

        const closeModal = (modal) => {
            modal.classList.remove('open');
            modal.setAttribute('aria-hidden', 'true');
            if (activeTrigger) {
                activeTrigger.focus();
            }
        };

        document.getElementById('open-add-product').addEventListener('click', () => {
            openModal(addModal);
        });

        document.querySelectorAll('[data-close-product-modal]').forEach((button) => {
            button.addEventListener('click', () => {
                closeModal(document.getElementById(button.dataset.closeProductModal));
            });
        });

        document.querySelectorAll('.edit-product-btn').forEach((button) => {
            button.addEventListener('click', () => {
                openEditProduct(button);
                openModal(editModal);
            });
        });

        document.querySelectorAll('.product-modal').forEach((modal) => {
            modal.addEventListener('click', (event) => {
                if (event.target === modal) {
                    closeModal(modal);
                }
            });
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                [addModal, editModal].forEach((modal) => {
                    if (modal.classList.contains('open')) {
                        closeModal(modal);
                    }
                });
            }
        });

        const addImagesInput = document.getElementById('add-product-images');
        const editImagesInput = document.getElementById('edit-product-images');
        const addImagesGallery = document.getElementById('add-product-image-gallery');
        const editExistingImagesGallery = document.getElementById('edit-product-existing-images');
        const editNewImagesGallery = editExistingImagesGallery;

        const renderNewImages = (input, gallery, append = false) => {
            if (append) {
                gallery.querySelectorAll('[data-image-reference^="new:"]').forEach((item) => item.remove());
            } else {
                gallery.replaceChildren();
            }

            Array.from(input.files).forEach((file, index) => {
                const item = document.createElement('div');
                item.className = 'product-image-item';
                item.draggable = true;
                item.dataset.imageReference = `new:${index}`;
                const image = document.createElement('img');
                image.src = URL.createObjectURL(file);
                image.alt = file.name;
                item.append(image);
                gallery.append(item);
            });
            syncImageOrder();
        };

        const renderExistingImages = (images, selectedForRemoval = []) => {
            editExistingImagesGallery.replaceChildren();

            images.forEach((imageData) => {
                const item = document.createElement('div');
                item.className = 'product-image-item';
                item.draggable = true;
                item.dataset.imageReference = `existing:${imageData.id}`;
                const image = document.createElement('img');
                image.src = imageData.url;
                image.alt = 'Product image';
                item.title = 'Drag to change image order';
                const label = document.createElement('label');
                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = 'delete_image_ids[]';
                checkbox.value = imageData.id;
                checkbox.checked = selectedForRemoval.includes(String(imageData.id));
                checkbox.addEventListener('change', syncImageOrder);
                const text = document.createTextNode('Remove');
                label.append(checkbox, text);
                item.append(image, label);
                editExistingImagesGallery.append(item);
            });
            syncImageOrder();
        };

        const syncImageOrder = () => {
            editExistingImagesGallery.querySelectorAll('input[name="image_order[]"]').forEach((input) => input.remove());

            Array.from(editExistingImagesGallery.children).forEach((item) => {
                const removeInput = item.querySelector('input[name="delete_image_ids[]"]');
                if (removeInput && removeInput.checked) {
                    return;
                }

                const orderInput = document.createElement('input');
                orderInput.type = 'hidden';
                orderInput.name = 'image_order[]';
                orderInput.value = item.dataset.imageReference;
                item.append(orderInput);
            });
        };

        editExistingImagesGallery.addEventListener('dragstart', (event) => {
            const item = event.target.closest('.product-image-item');
            if (!item) {
                return;
            }

            item.classList.add('dragging');
            event.dataTransfer.effectAllowed = 'move';
            event.dataTransfer.setData('text/plain', item.dataset.imageReference);
        });

        editExistingImagesGallery.addEventListener('dragover', (event) => {
            event.preventDefault();
            const dragging = editExistingImagesGallery.querySelector('.dragging');
            const target = event.target.closest('.product-image-item');
            if (!dragging || !target || target === dragging) {
                return;
            }

            const bounds = target.getBoundingClientRect();
            const insertAfter = event.clientX > bounds.left + bounds.width / 2;
            editExistingImagesGallery.insertBefore(dragging, insertAfter ? target.nextSibling : target);
            editExistingImagesGallery.querySelectorAll('.drag-over').forEach((item) => item.classList.remove('drag-over'));
            target.classList.add('drag-over');
        });

        editExistingImagesGallery.addEventListener('dragend', () => {
            editExistingImagesGallery.querySelectorAll('.dragging, .drag-over').forEach((item) => {
                item.classList.remove('dragging', 'drag-over');
            });
            syncImageOrder();
        });

        addImagesInput.addEventListener('change', () => {
            renderNewImages(addImagesInput, addImagesGallery);
        });

        editImagesInput.addEventListener('change', () => {
            renderNewImages(editImagesInput, editNewImagesGallery, true);
        });

        const openEditProduct = (button) => {
            document.getElementById('edit-product-form').action = button.dataset.updateUrl;
            document.getElementById('edit-product-id').value = button.dataset.productId;
            document.getElementById('edit-product-name').value = button.dataset.name || '';
            document.getElementById('edit-product-description').value = button.dataset.description || '';
            document.getElementById('edit-product-category').value = button.dataset.categoryId || '';
            document.getElementById('edit-product-price').value = button.dataset.price || '';
            document.getElementById('edit-product-stock').value = button.dataset.stock || '0';
            document.getElementById('edit-product-low-stock-threshold').value = button.dataset.lowStockThreshold || '0';
            document.getElementById('edit-product-status').value = button.dataset.status || '1';
            editImagesInput.value = '';
            editExistingImagesGallery.replaceChildren();
            renderExistingImages(JSON.parse(button.dataset.images || '[]'));
        };

        const reopenEditProductId = @json(old('_edit_product_id'));
        if (reopenEditProductId) {
            const editButton = Array.from(document.querySelectorAll('.edit-product-btn'))
                .find((button) => button.dataset.productId === String(reopenEditProductId));

            if (editButton) {
                openEditProduct(editButton);
                renderExistingImages(
                    JSON.parse(editButton.dataset.images || '[]'),
                    (@json(old('delete_image_ids', []))).map(String)
                );
                const itemsByReference = new Map(
                    Array.from(editExistingImagesGallery.children)
                        .map((item) => [item.dataset.imageReference, item])
                );
                (@json(old('image_order', []))).forEach((reference) => {
                    const item = itemsByReference.get(reference);
                    if (item) {
                        editExistingImagesGallery.append(item);
                        itemsByReference.delete(reference);
                    }
                });
                itemsByReference.forEach((item) => editExistingImagesGallery.append(item));
                syncImageOrder();
                document.getElementById('edit-product-name').value = @json(old('name', ''));
                document.getElementById('edit-product-description').value = @json(old('description', ''));
                document.getElementById('edit-product-category').value = @json(old('category_id', ''));
                document.getElementById('edit-product-price').value = @json(old('price', ''));
                document.getElementById('edit-product-stock').value = @json(old('stock_quantity', '0'));
                document.getElementById('edit-product-low-stock-threshold').value = @json(old('low_stock_threshold', '0'));
                document.getElementById('edit-product-status').value = @json(old('status', '1'));
            }
        }

        const searchInput = document.getElementById('product-search');
        const categoryFilter = document.getElementById('product-category-filter');
        const statusFilter = document.getElementById('product-status-filter');
        const productRows = Array.from(document.querySelectorAll('.product-row'));
        const showingCount = document.getElementById('product-showing-count');

        const filterProducts = () => {
            const search = searchInput.value.trim().toLocaleLowerCase();
            let visibleCount = 0;

            productRows.forEach((row) => {
                const matches = row.dataset.search.includes(search)
                    && (!categoryFilter.value || row.dataset.category === categoryFilter.value)
                    && (!statusFilter.value || row.dataset.status === statusFilter.value);
                row.hidden = !matches;
                visibleCount += matches ? 1 : 0;
            });

            showingCount.innerHTML = `Showing <strong>${visibleCount}</strong> of <strong>${productRows.length}</strong> products`;
        };

        [searchInput, categoryFilter, statusFilter].forEach((control) => {
            control.addEventListener('input', filterProducts);
            control.addEventListener('change', filterProducts);
        });
    })();
</script>

@endsection