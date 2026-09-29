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

        <a href="#" class="btn-primary">
            <span>+</span>
            Add Product
        </a>

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

                                <a href="#" class="action-btn">
                                    ✎
                                </a>

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

                                <a href="#" class="action-btn">
                                    ✎
                                </a>

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

                                <a href="#" class="action-btn">
                                    ✎
                                </a>

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

                                <a href="#" class="action-btn">
                                    ✎
                                </a>

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

                                <a href="#" class="action-btn">
                                    ✎
                                </a>

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

                                <a href="#" class="action-btn">
                                    ✎
                                </a>

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

@endsection