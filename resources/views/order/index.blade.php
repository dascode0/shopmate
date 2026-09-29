@extends('layouts.dashboard')

@section('title', 'Orders')
@section('page-title', 'Orders')

@section('content')

<style>
    .order-page {
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

    /* Statistics */

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

    .stat-sub.danger {
        color: #c84b4b;
    }

    /* Main card */

    .orders-card {
        background: #fff;
        border: 1px solid #e7ece9;
        border-radius: 12px;
        overflow: hidden;
    }

    .orders-toolbar {
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

    .orders-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1000px;
    }

    .orders-table th {
        padding: 13px 18px;
        text-align: left;
        background: #fafcfb;
        color: #68746d;
        font-size: 12px;
        font-weight: 600;
        border-bottom: 1px solid #edf0ee;
        white-space: nowrap;
    }

    .orders-table td {
        padding: 15px 18px;
        color: #354139;
        font-size: 13px;
        border-bottom: 1px solid #f0f2f1;
        vertical-align: middle;
    }

    .orders-table tr:last-child td {
        border-bottom: none;
    }

    .orders-table tr:hover {
        background: #fbfdfc;
    }

    .order-number {
        color: #16865c;
        font-weight: 700;
        text-decoration: none;
    }

    .order-number:hover {
        text-decoration: underline;
    }

    .customer-name {
        color: #17221c;
        font-weight: 600;
        margin-bottom: 3px;
    }

    .customer-email {
        color: #89938d;
        font-size: 11px;
    }

    .amount {
        font-weight: 700;
        color: #17221c;
    }

    .status {
        display: inline-flex;
        padding: 5px 9px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .status.pending {
        background: #fff4df;
        color: #a87312;
    }

    .status.processing {
        background: #e8f1fb;
        color: #3772a8;
    }

    .status.shipped {
        background: #eeeafd;
        color: #6854a6;
    }

    .status.delivered {
        background: #e7f6ee;
        color: #16865c;
    }

    .status.cancelled {
        background: #fdeaea;
        color: #c84b4b;
    }

    .payment {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        font-weight: 600;
    }

    .payment.paid {
        color: #16865c;
    }

    .payment.unpaid {
        color: #c88719;
    }

    .payment.failed {
        color: #c84b4b;
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

    /* Footer */

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

        .orders-toolbar {
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


<div class="order-page">

    {{-- Page Header --}}
    <div class="page-header">

        <div>
            <h2>Orders</h2>

            <p>
                Manage customer orders, payments and order status.
            </p>
        </div>

        <a href="#" class="btn-primary">
            <span>+</span>
            Create Order
        </a>

    </div>


    {{-- Statistics --}}
    <div class="stats-grid">

        <div class="stat-card">
            <div class="stat-label">Total Orders</div>
            <div class="stat-value">1,248</div>
            <div class="stat-sub">
                All orders
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Pending Orders</div>
            <div class="stat-value">42</div>
            <div class="stat-sub warning">
                Need processing
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Processing</div>
            <div class="stat-value">76</div>
            <div class="stat-sub">
                Currently processing
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Delivered</div>
            <div class="stat-value">1,084</div>
            <div class="stat-sub">
                Successfully delivered
            </div>
        </div>

    </div>


    {{-- Orders Table --}}
    <div class="orders-card">

        {{-- Toolbar --}}
        <div class="orders-toolbar">

            <div class="search-box">

                <span class="search-icon">⌕</span>

                <input
                    type="text"
                    placeholder="Search order or customer..."
                >

            </div>


            <div class="filter-box">

                <select>
                    <option value="">All Status</option>
                    <option>Pending</option>
                    <option>Processing</option>
                    <option>Shipped</option>
                    <option>Delivered</option>
                    <option>Cancelled</option>
                </select>

                <select>
                    <option value="">All Payments</option>
                    <option>Paid</option>
                    <option>Unpaid</option>
                    <option>Failed</option>
                </select>

            </div>

        </div>


        {{-- Table --}}
        <div class="table-wrapper">

            <table class="orders-table">

                <thead>

                    <tr>
                        <th>Order</th>
                        <th>Customer</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>

                </thead>


                <tbody>

                    {{-- Order 1 --}}
                    <tr>

                        <td>
                            <a href="#" class="order-number">
                                #ORD-1001
                            </a>
                        </td>

                        <td>
                            <div class="customer-name">
                                Rahul Sharma
                            </div>

                            <div class="customer-email">
                                rahul@example.com
                            </div>
                        </td>

                        <td>
                            3 items
                        </td>

                        <td class="amount">
                            ₹4,798.00
                        </td>

                        <td>
                            <span class="payment paid">
                                ● Paid
                            </span>
                        </td>

                        <td>
                            <span class="status delivered">
                                Delivered
                            </span>
                        </td>

                        <td>
                            29 Sep 2026
                        </td>

                        <td>

                            <div class="actions">

                                <a href="#" class="action-btn">
                                    ◉
                                </a>

                                <a href="#" class="action-btn">
                                    ✎
                                </a>

                            </div>

                        </td>

                    </tr>


                    {{-- Order 2 --}}
                    <tr>

                        <td>
                            <a href="#" class="order-number">
                                #ORD-1002
                            </a>
                        </td>

                        <td>
                            <div class="customer-name">
                                Priya Das
                            </div>

                            <div class="customer-email">
                                priya@example.com
                            </div>
                        </td>

                        <td>
                            2 items
                        </td>

                        <td class="amount">
                            ₹2,499.00
                        </td>

                        <td>
                            <span class="payment paid">
                                ● Paid
                            </span>
                        </td>

                        <td>
                            <span class="status shipped">
                                Shipped
                            </span>
                        </td>

                        <td>
                            29 Sep 2026
                        </td>

                        <td>

                            <div class="actions">

                                <a href="#" class="action-btn">
                                    ◉
                                </a>

                                <a href="#" class="action-btn">
                                    ✎
                                </a>

                            </div>

                        </td>

                    </tr>


                    {{-- Order 3 --}}
                    <tr>

                        <td>
                            <a href="#" class="order-number">
                                #ORD-1003
                            </a>
                        </td>

                        <td>
                            <div class="customer-name">
                                Amit Roy
                            </div>

                            <div class="customer-email">
                                amit@example.com
                            </div>
                        </td>

                        <td>
                            5 items
                        </td>

                        <td class="amount">
                            ₹7,850.00
                        </td>

                        <td>
                            <span class="payment paid">
                                ● Paid
                            </span>
                        </td>

                        <td>
                            <span class="status processing">
                                Processing
                            </span>
                        </td>

                        <td>
                            28 Sep 2026
                        </td>

                        <td>

                            <div class="actions">

                                <a href="#" class="action-btn">
                                    ◉
                                </a>

                                <a href="#" class="action-btn">
                                    ✎
                                </a>

                            </div>

                        </td>

                    </tr>


                    {{-- Order 4 --}}
                    <tr>

                        <td>
                            <a href="#" class="order-number">
                                #ORD-1004
                            </a>
                        </td>

                        <td>
                            <div class="customer-name">
                                Sneha Paul
                            </div>

                            <div class="customer-email">
                                sneha@example.com
                            </div>
                        </td>

                        <td>
                            1 item
                        </td>

                        <td class="amount">
                            ₹899.00
                        </td>

                        <td>
                            <span class="payment unpaid">
                                ● Unpaid
                            </span>
                        </td>

                        <td>
                            <span class="status pending">
                                Pending
                            </span>
                        </td>

                        <td>
                            28 Sep 2026
                        </td>

                        <td>

                            <div class="actions">

                                <a href="#" class="action-btn">
                                    ◉
                                </a>

                                <a href="#" class="action-btn">
                                    ✎
                                </a>

                            </div>

                        </td>

                    </tr>


                    {{-- Order 5 --}}
                    <tr>

                        <td>
                            <a href="#" class="order-number">
                                #ORD-1005
                            </a>
                        </td>

                        <td>
                            <div class="customer-name">
                                Arjun Sen
                            </div>

                            <div class="customer-email">
                                arjun@example.com
                            </div>
                        </td>

                        <td>
                            4 items
                        </td>

                        <td class="amount">
                            ₹5,299.00
                        </td>

                        <td>
                            <span class="payment paid">
                                ● Paid
                            </span>
                        </td>

                        <td>
                            <span class="status delivered">
                                Delivered
                            </span>
                        </td>

                        <td>
                            27 Sep 2026
                        </td>

                        <td>

                            <div class="actions">

                                <a href="#" class="action-btn">
                                    ◉
                                </a>

                                <a href="#" class="action-btn">
                                    ✎
                                </a>

                            </div>

                        </td>

                    </tr>


                    {{-- Order 6 --}}
                    <tr>

                        <td>
                            <a href="#" class="order-number">
                                #ORD-1006
                            </a>
                        </td>

                        <td>
                            <div class="customer-name">
                                Neha Gupta
                            </div>

                            <div class="customer-email">
                                neha@example.com
                            </div>
                        </td>

                        <td>
                            2 items
                        </td>

                        <td class="amount">
                            ₹3,299.00
                        </td>

                        <td>
                            <span class="payment failed">
                                ● Failed
                            </span>
                        </td>

                        <td>
                            <span class="status cancelled">
                                Cancelled
                            </span>
                        </td>

                        <td>
                            26 Sep 2026
                        </td>

                        <td>

                            <div class="actions">

                                <a href="#" class="action-btn">
                                    ◉
                                </a>

                                <a href="#" class="action-btn">
                                    ✎
                                </a>

                            </div>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>


        {{-- Footer --}}
        <div class="table-footer">

            <div class="showing-text">
                Showing 1 to 6 of 1,248 orders
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
