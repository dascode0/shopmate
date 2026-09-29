@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')


@section('content')

<style>

    /* =========================================
       DASHBOARD HEADER
    ========================================= */

    .dashboard-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;

        gap: 20px;

        margin-bottom: 22px;
    }

    .welcome h2 {
        font-size: 21px;
        color: #17221d;

        letter-spacing: -0.5px;

        margin-bottom: 5px;
    }

    .welcome p {
        color: #89958f;
        font-size: 11px;
    }

    .date-box {
        background: #ffffff;

        border: 1px solid #e5ece9;

        border-radius: 8px;

        padding: 9px 13px;

        color: #65736c;

        font-size: 10px;
    }


    /* =========================================
       STAT CARDS
    ========================================= */

    .stats-grid {
        display: grid;

        grid-template-columns:
            repeat(4, minmax(0, 1fr));

        gap: 15px;

        margin-bottom: 18px;
    }

    .stat-card {
        background: #ffffff;

        border: 1px solid #e5ece9;

        border-radius: 11px;

        padding: 17px;

        min-width: 0;

        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease;
    }

    .stat-card:hover {
        transform: translateY(-2px);

        box-shadow:
            0 10px 25px rgba(20, 75, 53, 0.07);
    }

    .stat-top {
        display: flex;

        align-items: center;

        justify-content: space-between;

        margin-bottom: 13px;
    }

    .stat-icon {
        width: 34px;
        height: 34px;

        border-radius: 9px;

        background: #eaf8f2;

        color: #07965f;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 14px;
    }

    .stat-menu {
        color: #a5b0aa;
        font-size: 16px;
    }

    .stat-label {
        color: #89958f;

        font-size: 10px;

        margin-bottom: 5px;
    }

    .stat-value {
        font-size: 22px;

        font-weight: 700;

        color: #17221d;

        letter-spacing: -0.6px;

        margin-bottom: 7px;
    }

    .stat-change {
        display: flex;

        align-items: center;

        gap: 5px;

        font-size: 9px;
    }

    .stat-change.positive {
        color: #07965f;
    }

    .stat-change.negative {
        color: #e05252;
    }

    .stat-period {
        color: #9aa59f;
    }


    /* =========================================
       CHART SECTION
    ========================================= */

    .dashboard-grid {
        display: grid;

        grid-template-columns:
            minmax(0, 1.55fr)
            minmax(260px, 0.75fr);

        gap: 17px;

        margin-bottom: 18px;
    }

    .card {
        background: #ffffff;

        border: 1px solid #e5ece9;

        border-radius: 11px;

        overflow: hidden;
    }

    .card-header {
        display: flex;

        align-items: center;

        justify-content: space-between;

        padding: 17px 18px;

        border-bottom:
            1px solid #eef2f0;
    }

    .card-title h3 {
        font-size: 13px;

        color: #27352e;

        margin-bottom: 4px;
    }

    .card-title p {
        color: #9aa59f;

        font-size: 9px;
    }

    .card-select {
        height: 30px;

        border: 1px solid #e2eae6;

        border-radius: 6px;

        background: #ffffff;

        padding: 0 9px;

        color: #68766f;

        font-size: 9px;

        outline: none;
    }


    /* =========================================
       SALES CHART
    ========================================= */

    .chart-area {
        height: 245px;

        padding: 18px 18px 12px;

        display: flex;

        flex-direction: column;

        justify-content: space-between;
    }

    .chart {
        height: 190px;

        position: relative;

        display: flex;

        align-items: flex-end;

        gap: 10px;

        padding:
            10px 8px 0 30px;
    }

    .chart::before {
        content: "";

        position: absolute;

        left: 30px;
        right: 8px;
        top: 25px;
        bottom: 22px;

        background:
            repeating-linear-gradient(
                to bottom,
                #edf2ef 0px,
                #edf2ef 1px,
                transparent 1px,
                transparent 38px
            );
    }

    .chart-y-labels {
        position: absolute;

        left: 0;
        top: 19px;
        bottom: 18px;

        display: flex;

        flex-direction: column;

        justify-content: space-between;

        color: #a0aaa5;

        font-size: 8px;
    }

    .chart-bars {
        height: 100%;

        flex: 1;

        display: flex;

        align-items: flex-end;

        justify-content: space-around;

        position: relative;

        z-index: 1;

        padding-bottom: 20px;
    }

    .bar-column {
        height: 100%;

        flex: 1;

        display: flex;

        align-items: center;

        justify-content: flex-end;

        flex-direction: column;

        gap: 6px;
    }

    .bar {
        width: min(22px, 55%);

        background:
            linear-gradient(
                180deg,
                #20b77b,
                #07965f
            );

        border-radius: 4px 4px 2px 2px;

        min-height: 8px;
    }

    .bar-label {
        font-size: 8px;

        color: #99a59f;
    }


    /* =========================================
       ORDER STATUS
    ========================================= */

    .status-content {
        padding: 22px 18px;

        min-height: 245px;

        display: flex;

        flex-direction: column;

        justify-content: center;
    }

    .donut-wrapper {
        display: flex;

        align-items: center;

        justify-content: center;

        gap: 22px;
    }

    .donut {
        width: 135px;
        height: 135px;

        border-radius: 50%;

        background:
            conic-gradient(
                #07965f 0deg 235deg,
                #4bb9db 235deg 295deg,
                #f0a83b 295deg 330deg,
                #e45c65 330deg 360deg
            );

        position: relative;

        flex-shrink: 0;
    }

    .donut::after {
        content: "";

        position: absolute;

        width: 82px;
        height: 82px;

        border-radius: 50%;

        background: white;

        top: 50%;
        left: 50%;

        transform: translate(-50%, -50%);
    }

    .donut-center {
        position: absolute;

        z-index: 2;

        inset: 0;

        display: flex;

        flex-direction: column;

        align-items: center;
        justify-content: center;
    }

    .donut-center strong {
        font-size: 21px;
        color: #17221d;
    }

    .donut-center span {
        font-size: 8px;
        color: #98a49e;
        margin-top: 2px;
    }

    .status-list {
        display: flex;

        flex-direction: column;

        gap: 10px;
    }

    .status-item {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 12px;

        font-size: 9px;

        color: #67746e;
    }

    .status-name {
        display: flex;

        align-items: center;

        gap: 7px;
    }

    .status-dot {
        width: 7px;
        height: 7px;

        border-radius: 50%;
    }

    .dot-green {
        background: #07965f;
    }

    .dot-blue {
        background: #4bb9db;
    }

    .dot-orange {
        background: #f0a83b;
    }

    .dot-red {
        background: #e45c65;
    }

    .status-percent {
        font-weight: 700;

        color: #37453e;
    }


    /* =========================================
       TABLES
    ========================================= */

    .bottom-grid {
        display: grid;

        grid-template-columns:
            minmax(0, 1.4fr)
            minmax(300px, 0.8fr);

        gap: 17px;
    }

    .view-all {
        color: #07965f;

        font-size: 9px;

        font-weight: 700;
    }

    .table-wrapper {
        width: 100%;

        overflow-x: auto;
    }

    table {
        width: 100%;

        border-collapse: collapse;

        min-width: 540px;
    }

    th {
        padding: 11px 17px;

        background: #fafcfb;

        color: #9aa59f;

        font-size: 8px;

        font-weight: 600;

        text-align: left;

        border-bottom:
            1px solid #edf1ef;
    }

    td {
        padding: 12px 17px;

        color: #59675f;

        font-size: 9px;

        border-bottom:
            1px solid #f0f3f1;
    }

    tr:last-child td {
        border-bottom: 0;
    }

    .order-id {
        color: #27352e;

        font-weight: 700;
    }

    .customer {
        display: flex;

        align-items: center;

        gap: 8px;
    }

    .customer-avatar {
        width: 24px;
        height: 24px;

        border-radius: 50%;

        background: #e6f6ef;

        color: #078f5b;

        display: flex;

        align-items: center;
        justify-content: center;

        font-size: 8px;

        font-weight: 700;
    }

    .badge {
        display: inline-flex;

        align-items: center;

        padding: 4px 7px;

        border-radius: 5px;

        font-size: 7px;

        font-weight: 700;
    }

    .badge-success {
        background: #e7f8ef;
        color: #078f5b;
    }

    .badge-warning {
        background: #fff4dc;
        color: #c4871e;
    }

    .badge-danger {
        background: #ffeded;
        color: #d74b52;
    }

    .badge-info {
        background: #e9f5fb;
        color: #3d96bb;
    }


    /* =========================================
       LOW STOCK
    ========================================= */

    .stock-list {
        padding: 7px 17px 9px;
    }

    .stock-item {
        display: flex;

        align-items: center;

        gap: 10px;

        padding: 12px 0;

        border-bottom:
            1px solid #f0f3f1;
    }

    .stock-item:last-child {
        border-bottom: 0;
    }

    .product-image {
        width: 34px;
        height: 34px;

        border-radius: 7px;

        background: #eef7f3;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #078f5b;

        font-size: 14px;

        flex-shrink: 0;
    }

    .product-info {
        flex: 1;

        min-width: 0;
    }

    .product-info strong {
        display: block;

        color: #344139;

        font-size: 10px;

        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .product-info span {
        display: block;

        color: #9aa59f;

        font-size: 8px;

        margin-top: 3px;
    }

    .stock-count {
        text-align: right;
    }

    .stock-count strong {
        display: block;

        font-size: 10px;

        color: #d74b52;
    }

    .stock-count span {
        font-size: 8px;

        color: #9aa59f;
    }


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 1100px) {

        .stats-grid {
            grid-template-columns:
                repeat(2, minmax(0, 1fr));
        }

        .dashboard-grid {
            grid-template-columns: 1fr;
        }

        .bottom-grid {
            grid-template-columns: 1fr;
        }

    }

    @media (max-width: 600px) {

        .dashboard-header {
            align-items: flex-start;

            flex-direction: column;

            margin-bottom: 17px;
        }

        .welcome h2 {
            font-size: 18px;
        }

        .stats-grid {
            grid-template-columns: 1fr 1fr;

            gap: 10px;
        }

        .stat-card {
            padding: 13px;
        }

        .stat-icon {
            width: 30px;
            height: 30px;
        }

        .stat-value {
            font-size: 19px;
        }

        .chart-area {
            height: 220px;
        }

        .donut-wrapper {
            flex-direction: column;

            gap: 18px;
        }

        .status-content {
            padding: 18px;
        }

    }

    @media (max-width: 380px) {

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .stat-card {
            display: flex;

            align-items: center;

            gap: 14px;
        }

        .stat-top {
            margin-bottom: 0;
        }

        .stat-content {
            flex: 1;
        }

        .stat-menu {
            display: none;
        }

    }

</style>


{{-- =========================================
     WELCOME HEADER
========================================= --}}

<div class="dashboard-header">

    <div class="welcome">

        <h2>
            Good Morning,
            {{ auth()->user()->name ?? 'User' }}
            👋
        </h2>

        <p>
            Here's what's happening with your store today.
        </p>

    </div>


    <div class="date-box">

        📅 {{ now()->format('d M Y') }}

    </div>

</div>


{{-- =========================================
     STAT CARDS
========================================= --}}

<div class="stats-grid">

    {{-- SALES --}}
    <div class="stat-card">

        <div class="stat-top">

            <div class="stat-icon">
                ₹
            </div>

            <div class="stat-menu">
                ⋮
            </div>

        </div>

        <div class="stat-content">

            <div class="stat-label">
                Total Sales
            </div>

            <div class="stat-value">
                ₹42,850
            </div>

            <div class="stat-change positive">
                ↑ 12.5%
                <span class="stat-period">
                    vs last month
                </span>
            </div>

        </div>

    </div>


    {{-- ORDERS --}}
    <div class="stat-card">

        <div class="stat-top">

            <div class="stat-icon">
                ▤
            </div>

            <div class="stat-menu">
                ⋮
            </div>

        </div>

        <div class="stat-content">

            <div class="stat-label">
                Orders
            </div>

            <div class="stat-value">
                36
            </div>

            <div class="stat-change positive">
                ↑ 8.2%
                <span class="stat-period">
                    vs last month
                </span>
            </div>

        </div>

    </div>


    {{-- CUSTOMERS --}}
    <div class="stat-card">

        <div class="stat-top">

            <div class="stat-icon">
                ♙
            </div>

            <div class="stat-menu">
                ⋮
            </div>

        </div>

        <div class="stat-content">

            <div class="stat-label">
                Customers
            </div>

            <div class="stat-value">
                1,284
            </div>

            <div class="stat-change positive">
                ↑ 6.4%
                <span class="stat-period">
                    vs last month
                </span>
            </div>

        </div>

    </div>


    {{-- LOW STOCK --}}
    <div class="stat-card">

        <div class="stat-top">

            <div class="stat-icon"
                 style="background:#fff1f1;color:#e05252;">
                !
            </div>

            <div class="stat-menu">
                ⋮
            </div>

        </div>

        <div class="stat-content">

            <div class="stat-label">
                Low Stock
            </div>

            <div class="stat-value">
                12
            </div>

            <div class="stat-change negative">
                ↓ 3 items
                <span class="stat-period">
                    this week
                </span>
            </div>

        </div>

    </div>

</div>


{{-- =========================================
     SALES + ORDER STATUS
========================================= --}}

<div class="dashboard-grid">

    {{-- SALES OVERVIEW --}}
    <div class="card">

        <div class="card-header">

            <div class="card-title">

                <h3>
                    Sales Overview
                </h3>

                <p>
                    Revenue performance
                </p>

            </div>


            <select class="card-select">

                <option>
                    Last 7 Days
                </option>

                <option>
                    Last 30 Days
                </option>

                <option>
                    Last 3 Months
                </option>

            </select>

        </div>


        <div class="chart-area">

            <div class="chart">

                <div class="chart-y-labels">
                    <span>₹50k</span>
                    <span>₹40k</span>
                    <span>₹30k</span>
                    <span>₹20k</span>
                    <span>₹10k</span>
                    <span>₹0</span>
                </div>


                <div class="chart-bars">

                    <div class="bar-column">
                        <div class="bar" style="height:42%;"></div>
                        <span class="bar-label">Mon</span>
                    </div>

                    <div class="bar-column">
                        <div class="bar" style="height:58%;"></div>
                        <span class="bar-label">Tue</span>
                    </div>

                    <div class="bar-column">
                        <div class="bar" style="height:47%;"></div>
                        <span class="bar-label">Wed</span>
                    </div>

                    <div class="bar-column">
                        <div class="bar" style="height:68%;"></div>
                        <span class="bar-label">Thu</span>
                    </div>

                    <div class="bar-column">
                        <div class="bar" style="height:55%;"></div>
                        <span class="bar-label">Fri</span>
                    </div>

                    <div class="bar-column">
                        <div class="bar" style="height:78%;"></div>
                        <span class="bar-label">Sat</span>
                    </div>

                    <div class="bar-column">
                        <div class="bar" style="height:88%;"></div>
                        <span class="bar-label">Sun</span>
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ORDER STATUS --}}
    <div class="card">

        <div class="card-header">

            <div class="card-title">

                <h3>
                    Order Status
                </h3>

                <p>
                    Current order distribution
                </p>

            </div>

            <span class="view-all">
                View All
            </span>

        </div>


        <div class="status-content">

            <div class="donut-wrapper">

                <div class="donut">

                    <div class="donut-center">

                        <strong>36</strong>

                        <span>
                            Total Orders
                        </span>

                    </div>

                </div>


                <div class="status-list">

                    <div class="status-item">

                        <div class="status-name">

                            <span class="status-dot dot-green"></span>

                            Delivered

                        </div>

                        <span class="status-percent">
                            65%
                        </span>

                    </div>


                    <div class="status-item">

                        <div class="status-name">

                            <span class="status-dot dot-blue"></span>

                            Pending

                        </div>

                        <span class="status-percent">
                            15%
                        </span>

                    </div>


                    <div class="status-item">

                        <div class="status-name">

                            <span class="status-dot dot-orange"></span>

                            Processing

                        </div>

                        <span class="status-percent">
                            12%
                        </span>

                    </div>


                    <div class="status-item">

                        <div class="status-name">

                            <span class="status-dot dot-red"></span>

                            Cancelled

                        </div>

                        <span class="status-percent">
                            8%
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================================
     RECENT ORDERS + LOW STOCK
========================================= --}}

<div class="bottom-grid">

    {{-- RECENT ORDERS --}}
    <div class="card">

        <div class="card-header">

            <div class="card-title">

                <h3>
                    Recent Orders
                </h3>

                <p>
                    Latest customer orders
                </p>

            </div>

            <a href="#" class="view-all">
                View All
            </a>

        </div>


        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>

                        <th>
                            ORDER ID
                        </th>

                        <th>
                            CUSTOMER
                        </th>

                        <th>
                            AMOUNT
                        </th>

                        <th>
                            STATUS
                        </th>

                        <th>
                            DATE
                        </th>

                    </tr>

                </thead>


                <tbody>

                    <tr>

                        <td>
                            <span class="order-id">
                                #ORD-1024
                            </span>
                        </td>

                        <td>

                            <div class="customer">

                                <div class="customer-avatar">
                                    PS
                                </div>

                                Priya Sharma

                            </div>

                        </td>

                        <td>
                            ₹1,850
                        </td>

                        <td>
                            <span class="badge badge-success">
                                Delivered
                            </span>
                        </td>

                        <td>
                            29 Sep 2026
                        </td>

                    </tr>


                    <tr>

                        <td>
                            <span class="order-id">
                                #ORD-1023
                            </span>
                        </td>

                        <td>

                            <div class="customer">

                                <div class="customer-avatar">
                                    AR
                                </div>

                                Amit Roy

                            </div>

                        </td>

                        <td>
                            ₹2,430
                        </td>

                        <td>
                            <span class="badge badge-warning">
                                Pending
                            </span>
                        </td>

                        <td>
                            29 Sep 2026
                        </td>

                    </tr>


                    <tr>

                        <td>
                            <span class="order-id">
                                #ORD-1022
                            </span>
                        </td>

                        <td>

                            <div class="customer">

                                <div class="customer-avatar">
                                    SG
                                </div>

                                Sneha Gupta

                            </div>

                        </td>

                        <td>
                            ₹980
                        </td>

                        <td>
                            <span class="badge badge-info">
                                Processing
                            </span>
                        </td>

                        <td>
                            28 Sep 2026
                        </td>

                    </tr>


                    <tr>

                        <td>
                            <span class="order-id">
                                #ORD-1021
                            </span>
                        </td>

                        <td>

                            <div class="customer">

                                <div class="customer-avatar">
                                    RK
                                </div>

                                Rahul Kumar

                            </div>

                        </td>

                        <td>
                            ₹3,200
                        </td>

                        <td>
                            <span class="badge badge-success">
                                Delivered
                            </span>
                        </td>

                        <td>
                            28 Sep 2026
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>


    {{-- LOW STOCK --}}
    <div class="card">

        <div class="card-header">

            <div class="card-title">

                <h3>
                    Low Stock Products
                </h3>

                <p>
                    Products that need attention
                </p>

            </div>

            <a href="#" class="view-all">
                View All
            </a>

        </div>


        <div class="stock-list">

            <div class="stock-item">

                <div class="product-image">
                    ▣
                </div>

                <div class="product-info">

                    <strong>
                        Laptop Pro
                    </strong>

                    <span>
                        Electronics
                    </span>

                </div>

                <div class="stock-count">

                    <strong>
                        4
                    </strong>

                    <span>
                        left
                    </span>

                </div>

            </div>


            <div class="stock-item">

                <div class="product-image">
                    ◫
                </div>

                <div class="product-info">

                    <strong>
                        Wireless Mouse
                    </strong>

                    <span>
                        Accessories
                    </span>

                </div>

                <div class="stock-count">

                    <strong>
                        7
                    </strong>

                    <span>
                        left
                    </span>

                </div>

            </div>


            <div class="stock-item">

                <div class="product-image">
                    ▤
                </div>

                <div class="product-info">

                    <strong>
                        Mechanical Keyboard
                    </strong>

                    <span>
                        Accessories
                    </span>

                </div>

                <div class="stock-count">

                    <strong>
                        3
                    </strong>

                    <span>
                        left
                    </span>

                </div>

            </div>


            <div class="stock-item">

                <div class="product-image">
                    ▥
                </div>

                <div class="product-info">

                    <strong>
                        USB-C Cable
                    </strong>

                    <span>
                        Accessories
                    </span>

                </div>

                <div class="stock-count">

                    <strong>
                        5
                    </strong>

                    <span>
                        left
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection