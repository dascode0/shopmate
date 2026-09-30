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
            <div class="stat-value">248</div>
            <div class="stat-sub">All products</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Active Products</div>
            <div class="stat-value">221</div>
            <div class="stat-sub">Currently available</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Low Stock</div>
            <div class="stat-value">18</div>
            <div class="stat-sub warning">Needs attention</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Out of Stock</div>
            <div class="stat-value">9</div>
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
                >

            </div>


            <div class="filter-box">

                <select>
                    <option value="">All Categories</option>
                    <option>Electronics</option>
                    <option>Accessories</option>
                    <option>Clothing</option>
                    <option>Home & Kitchen</option>
                    <option>Sports</option>
                </select>

                <select>
                    <option value="">All Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                    <option>Draft</option>
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

                    <tr>

                        <td>

                            <div class="product-info">

                                <div class="product-image">
                                    ◈
                                </div>

                                <div>
                                    <div class="product-name">
                                        Wireless Headphones
                                    </div>

                                    <div class="product-code">
                                        SKU-001
                                    </div>
                                </div>

                            </div>

                        </td>

                        <td>Electronics</td>

                        <td class="price">
                            ₹2,499.00
                        </td>

                        <td class="stock good">
                            48
                        </td>

                        <td>
                            <span class="status active">
                                Active
                            </span>
                        </td>

                        <td>
                            20 Sep 2026
                        </td>

                        <td>

                            <div class="actions">

                                <button
                                    type="button"
                                    class="action-btn edit-product-btn"
                                    aria-label="Edit Wireless Headphones"
                                    data-name="Wireless Headphones"
                                    data-sku="SKU-001"
                                    data-category="Electronics"
                                    data-price="2499"
                                    data-stock="48"
                                    data-status="active">✎</button>

                                <a href="#" class="action-btn">
                                    ◉
                                </a>

                                <button class="action-btn delete">
                                    ×
                                </button>

                            </div>

                        </td>

                    </tr>


                    <tr>

                        <td>

                            <div class="product-info">

                                <div class="product-image">
                                    ◇
                                </div>

                                <div>
                                    <div class="product-name">
                                        Premium USB Cable
                                    </div>

                                    <div class="product-code">
                                        SKU-002
                                    </div>
                                </div>

                            </div>

                        </td>

                        <td>Accessories</td>

                        <td class="price">
                            ₹499.00
                        </td>

                        <td class="stock good">
                            120
                        </td>

                        <td>
                            <span class="status active">
                                Active
                            </span>
                        </td>

                        <td>
                            18 Sep 2026
                        </td>

                        <td>

                            <div class="actions">

                                <button
                                    type="button"
                                    class="action-btn edit-product-btn"
                                    aria-label="Edit Premium USB Cable"
                                    data-name="Premium USB Cable"
                                    data-sku="SKU-002"
                                    data-category="Accessories"
                                    data-price="499"
                                    data-stock="120"
                                    data-status="active">✎</button>

                                <a href="#" class="action-btn">
                                    ◉
                                </a>

                                <button class="action-btn delete">
                                    ×
                                </button>

                            </div>

                        </td>

                    </tr>


                    <tr>

                        <td>

                            <div class="product-info">

                                <div class="product-image">
                                    ▣
                                </div>

                                <div>
                                    <div class="product-name">
                                        Men's Casual Shirt
                                    </div>

                                    <div class="product-code">
                                        SKU-003
                                    </div>
                                </div>

                            </div>

                        </td>

                        <td>Clothing</td>

                        <td class="price">
                            ₹1,299.00
                        </td>

                        <td class="stock low">
                            7
                        </td>

                        <td>
                            <span class="status active">
                                Active
                            </span>
                        </td>

                        <td>
                            15 Sep 2026
                        </td>

                        <td>

                            <div class="actions">

                                <button
                                    type="button"
                                    class="action-btn edit-product-btn"
                                    aria-label="Edit Men's Casual Shirt"
                                    data-name="Men's Casual Shirt"
                                    data-sku="SKU-003"
                                    data-category="Clothing"
                                    data-price="1299"
                                    data-stock="7"
                                    data-status="active">✎</button>

                                <a href="#" class="action-btn">
                                    ◉
                                </a>

                                <button class="action-btn delete">
                                    ×
                                </button>

                            </div>

                        </td>

                    </tr>


                    <tr>

                        <td>

                            <div class="product-info">

                                <div class="product-image">
                                    ▤
                                </div>

                                <div>
                                    <div class="product-name">
                                        Kitchen Storage Set
                                    </div>

                                    <div class="product-code">
                                        SKU-004
                                    </div>
                                </div>

                            </div>

                        </td>

                        <td>Home & Kitchen</td>

                        <td class="price">
                            ₹899.00
                        </td>

                        <td class="stock out">
                            0
                        </td>

                        <td>
                            <span class="status inactive">
                                Inactive
                            </span>
                        </td>

                        <td>
                            12 Sep 2026
                        </td>

                        <td>

                            <div class="actions">

                                <button
                                    type="button"
                                    class="action-btn edit-product-btn"
                                    aria-label="Edit Kitchen Storage Set"
                                    data-name="Kitchen Storage Set"
                                    data-sku="SKU-004"
                                    data-category="Home &amp; Kitchen"
                                    data-price="899"
                                    data-stock="0"
                                    data-status="inactive">✎</button>

                                <a href="#" class="action-btn">
                                    ◉
                                </a>

                                <button class="action-btn delete">
                                    ×
                                </button>

                            </div>

                        </td>

                    </tr>


                    <tr>

                        <td>

                            <div class="product-info">

                                <div class="product-image">
                                    ◫
                                </div>

                                <div>
                                    <div class="product-name">
                                        Running Shoes
                                    </div>

                                    <div class="product-code">
                                        SKU-005
                                    </div>
                                </div>

                            </div>

                        </td>

                        <td>Sports</td>

                        <td class="price">
                            ₹2,999.00
                        </td>

                        <td class="stock low">
                            5
                        </td>

                        <td>
                            <span class="status draft">
                                Draft
                            </span>
                        </td>

                        <td>
                            08 Sep 2026
                        </td>

                        <td>

                            <div class="actions">

                                <button
                                    type="button"
                                    class="action-btn edit-product-btn"
                                    aria-label="Edit Running Shoes"
                                    data-name="Running Shoes"
                                    data-sku="SKU-005"
                                    data-category="Sports"
                                    data-price="2999"
                                    data-stock="5"
                                    data-status="draft">✎</button>

                                <a href="#" class="action-btn">
                                    ◉
                                </a>

                                <button class="action-btn delete">
                                    ×
                                </button>

                            </div>

                        </td>

                    </tr>


                    <tr>

                        <td>

                            <div class="product-info">

                                <div class="product-image">
                                    ◎
                                </div>

                                <div>
                                    <div class="product-name">
                                        Face Care Kit
                                    </div>

                                    <div class="product-code">
                                        SKU-006
                                    </div>
                                </div>

                            </div>

                        </td>

                        <td>Beauty</td>

                        <td class="price">
                            ₹1,599.00
                        </td>

                        <td class="stock good">
                            36
                        </td>

                        <td>
                            <span class="status active">
                                Active
                            </span>
                        </td>

                        <td>
                            05 Sep 2026
                        </td>

                        <td>

                            <div class="actions">

                                <button
                                    type="button"
                                    class="action-btn edit-product-btn"
                                    aria-label="Edit Face Care Kit"
                                    data-name="Face Care Kit"
                                    data-sku="SKU-006"
                                    data-category="Beauty"
                                    data-price="1599"
                                    data-stock="36"
                                    data-status="active">✎</button>

                                <a href="#" class="action-btn">
                                    ◉
                                </a>

                                <button class="action-btn delete">
                                    ×
                                </button>

                            </div>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>


        {{-- Footer --}}
        <div class="table-footer">

            <div class="showing-text">
                Showing 1 to 6 of 248 products
            </div>

            <div class="pagination">

                <button class="page-btn">
                    ‹
                </button>

                <button class="page-btn active">
                    1
                </button>

                <button class="page-btn">
                    2
                </button>

                <button class="page-btn">
                    3
                </button>

                <button class="page-btn">
                    4
                </button>

                <button class="page-btn">
                    ›
                </button>

            </div>

        </div>

    </div>

</div>

<div class="product-modal" id="add-product-modal" aria-hidden="true">
    <section class="product-modal-card" role="dialog" aria-modal="true" aria-labelledby="add-product-title">
        <div class="product-modal-header">
            <div>
                <h3 id="add-product-title">Add Product</h3>
                <p>Add product details, pricing, stock and status.</p>
            </div>
            <button type="button" class="product-modal-close" data-close-product-modal="add-product-modal" aria-label="Close form">&times;</button>
        </div>

        <form class="product-preview-form">
            <div class="product-image-preview">
                <div class="product-image-placeholder" id="add-product-image-placeholder">◈</div>
                <img id="add-product-image-preview" alt="Product image preview" hidden>
                <p>Choose an image to preview it here.</p>
            </div>

            <div class="product-form-grid">
                <div class="product-form-field">
                    <label for="add-product-name">Product name *</label>
                    <input id="add-product-name" name="name" type="text" maxlength="255" required placeholder="e.g. Wireless Headphones">
                </div>
                <div class="product-form-field">
                    <label for="add-product-sku">SKU *</label>
                    <input id="add-product-sku" name="sku" type="text" maxlength="100" required placeholder="e.g. SKU-007">
                </div>
                <div class="product-form-field">
                    <label for="add-product-category">Category *</label>
                    <select id="add-product-category" name="category" required>
                        <option value="">Select a category</option>
                        <option>Electronics</option>
                        <option>Accessories</option>
                        <option>Clothing</option>
                        <option>Home &amp; Kitchen</option>
                        <option>Sports</option>
                        <option>Beauty</option>
                    </select>
                </div>
                <div class="product-form-field">
                    <label for="add-product-status">Status</label>
                    <select id="add-product-status" name="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                <div class="product-form-field">
                    <label for="add-product-price">Selling price (₹) *</label>
                    <input id="add-product-price" name="price" type="number" min="0" step="0.01" required placeholder="0.00">
                </div>
                <div class="product-form-field">
                    <label for="add-product-stock">Stock quantity *</label>
                    <input id="add-product-stock" name="stock" type="number" min="0" step="1" required placeholder="0">
                </div>
                <div class="product-form-field full-width">
                    <label for="add-product-image">Product image</label>
                    <input id="add-product-image" name="image" type="file" accept="image/*">
                </div>
                <div class="product-form-field full-width">
                    <label for="add-product-description">Description</label>
                    <textarea id="add-product-description" name="description" maxlength="2000" placeholder="Describe the product"></textarea>
                </div>
            </div>

            <div class="product-form-actions">
                <button type="button" data-close-product-modal="add-product-modal">Cancel</button>
                <button type="submit" class="product-save-btn">Save Product</button>
            </div>
        </form>
    </section>
</div>

<div class="product-modal" id="edit-product-modal" aria-hidden="true">
    <section class="product-modal-card" role="dialog" aria-modal="true" aria-labelledby="edit-product-title">
        <div class="product-modal-header">
            <div>
                <h3 id="edit-product-title">Edit Product</h3>
                <p>Update the product details, pricing, stock and status.</p>
            </div>
            <button type="button" class="product-modal-close" data-close-product-modal="edit-product-modal" aria-label="Close form">&times;</button>
        </div>

        <form class="product-preview-form">
            <div class="product-image-preview">
                <div class="product-image-placeholder" id="edit-product-image-placeholder">◈</div>
                <img id="edit-product-image-preview" alt="Product image preview" hidden>
                <p>Choose a new image or keep the current product image.</p>
            </div>

            <div class="product-form-grid">
                <div class="product-form-field">
                    <label for="edit-product-name">Product name *</label>
                    <input id="edit-product-name" name="name" type="text" maxlength="255" required>
                </div>
                <div class="product-form-field">
                    <label for="edit-product-sku">SKU *</label>
                    <input id="edit-product-sku" name="sku" type="text" maxlength="100" required>
                </div>
                <div class="product-form-field">
                    <label for="edit-product-category">Category *</label>
                    <select id="edit-product-category" name="category" required>
                        <option value="">Select a category</option>
                        <option>Electronics</option>
                        <option>Accessories</option>
                        <option>Clothing</option>
                        <option>Home &amp; Kitchen</option>
                        <option>Sports</option>
                        <option>Beauty</option>
                    </select>
                </div>
                <div class="product-form-field">
                    <label for="edit-product-status">Status</label>
                    <select id="edit-product-status" name="status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                <div class="product-form-field">
                    <label for="edit-product-price">Selling price (₹) *</label>
                    <input id="edit-product-price" name="price" type="number" min="0" step="0.01" required>
                </div>
                <div class="product-form-field">
                    <label for="edit-product-stock">Stock quantity *</label>
                    <input id="edit-product-stock" name="stock" type="number" min="0" step="1" required>
                </div>
                <div class="product-form-field full-width">
                    <label for="edit-product-image">Product image</label>
                    <input id="edit-product-image" name="image" type="file" accept="image/*">
                </div>
                <div class="product-form-field full-width">
                    <label for="edit-product-description">Description</label>
                    <textarea id="edit-product-description" name="description" maxlength="2000" placeholder="Describe the product"></textarea>
                </div>
            </div>

            <div class="product-form-actions">
                <button type="button" data-close-product-modal="edit-product-modal">Cancel</button>
                <button type="submit" class="product-save-btn">Save Changes</button>
            </div>
        </form>
    </section>
</div>

<div class="product-preview-notice" id="product-preview-notice" role="status" aria-live="polite">
    Frontend preview only. Product changes are not saved.
</div>

<script>
    (() => {
        const addModal = document.getElementById('add-product-modal');
        const editModal = document.getElementById('edit-product-modal');
        const notice = document.getElementById('product-preview-notice');
        let activeTrigger = null;
        let noticeTimeout;

        const openModal = (modal) => {
            activeTrigger = document.activeElement;
            modal.classList.add('open');
            modal.setAttribute('aria-hidden', 'false');
            modal.querySelector('input:not([type="file"])').focus();
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
                document.getElementById('edit-product-name').value = button.dataset.name || '';
                document.getElementById('edit-product-sku').value = button.dataset.sku || '';
                document.getElementById('edit-product-category').value = button.dataset.category || '';
                document.getElementById('edit-product-price').value = button.dataset.price || '';
                document.getElementById('edit-product-stock').value = button.dataset.stock || '0';
                document.getElementById('edit-product-status').value = button.dataset.status || 'active';
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

        document.querySelectorAll('.product-preview-form').forEach((form) => {
            form.addEventListener('submit', (event) => {
                event.preventDefault();
                notice.classList.add('show');
                window.clearTimeout(noticeTimeout);
                noticeTimeout = window.setTimeout(() => {
                    notice.classList.remove('show');
                }, 3200);
            });
        });

        document.querySelectorAll('.product-modal input[type="file"]').forEach((input) => {
            input.addEventListener('change', () => {
                const prefix = input.id.startsWith('edit-') ? 'edit' : 'add';
                const preview = document.getElementById(`${prefix}-product-image-preview`);
                const placeholder = document.getElementById(`${prefix}-product-image-placeholder`);
                const file = input.files[0];

                if (!file) {
                    preview.removeAttribute('src');
                    preview.hidden = true;
                    placeholder.hidden = false;
                    return;
                }

                preview.src = URL.createObjectURL(file);
                preview.hidden = false;
                placeholder.hidden = true;
            });
        });
    })();
</script>

@endsection