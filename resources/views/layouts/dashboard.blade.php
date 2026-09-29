<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Dashboard') | ShopMate
    </title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1f2937;
        }

        a {
            text-decoration: none;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #111827;
            color: white;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar-logo {
            height: 70px;
            display: flex;
            align-items: center;
            padding: 0 25px;
            border-bottom: 1px solid #273244;
        }

        .sidebar-logo a {
            font-size: 25px;
            font-weight: 700;
            color: white;
        }

        .sidebar-logo span {
            color: #60a5fa;
        }

        .sidebar-menu {
            padding: 25px 15px;
        }

        .menu-title {
            font-size: 11px;
            color: #6b7280;
            text-transform: uppercase;
            font-weight: 700;
            margin: 0 10px 10px;
            letter-spacing: 0.8px;
        }

        .menu-item {
            margin-bottom: 5px;
        }

        .menu-item a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 12px 14px;
            color: #cbd5e1;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu-item a:hover,
        .menu-item a.active {
            background: #2563eb;
            color: white;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .menu-divider {
            height: 1px;
            background: #273244;
            margin: 20px 10px;
        }


        /* =========================
           MAIN AREA
        ========================= */

        .main-wrapper {
            margin-left: 250px;
            min-height: 100vh;
        }


        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .page-title {
            font-size: 20px;
            font-weight: 600;
            color: #111827;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification {
            position: relative;
            font-size: 20px;
            color: #4b5563;
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -7px;
            right: -7px;
            background: #ef4444;
            color: white;
            width: 17px;
            height: 17px;
            border-radius: 50%;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
        }

        .profile-avatar {
            width: 38px;
            height: 38px;
            background: #2563eb;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .profile-info {
            line-height: 1.3;
        }

        .profile-name {
            font-size: 14px;
            font-weight: 600;
        }

        .profile-company {
            font-size: 11px;
            color: #6b7280;
        }


        /* =========================
           CONTENT
        ========================= */

        .content {
            padding: 30px;
        }

        .welcome-section {
            margin-bottom: 25px;
        }

        .welcome-section h1 {
            font-size: 25px;
            color: #111827;
            margin-bottom: 7px;
        }

        .welcome-section p {
            color: #6b7280;
            font-size: 14px;
        }


        /* =========================
           STAT CARDS
        ========================= */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 22px;
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .stat-title {
            color: #6b7280;
            font-size: 13px;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            background: #eff6ff;
            color: #2563eb;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-value {
            font-size: 27px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 7px;
        }

        .stat-change {
            font-size: 12px;
            color: #16a34a;
        }

        .stat-change.warning {
            color: #dc2626;
        }


        /* =========================
           DASHBOARD GRID
        ========================= */

        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
        }

        .card-header {
            padding: 20px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h3 {
            font-size: 16px;
            color: #111827;
        }

        .card-header a {
            color: #2563eb;
            font-size: 13px;
        }

        .card-body {
            padding: 20px;
        }


        /* =========================
           SALES CHART
        ========================= */

        .chart-container {
            height: 280px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fafafa;
            border-radius: 8px;
            color: #9ca3af;
            font-size: 14px;
        }


        /* =========================
           RECENT ORDERS
        ========================= */

        .order-list {
            display: flex;
            flex-direction: column;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-number {
            font-size: 13px;
            font-weight: 600;
            color: #111827;
        }

        .order-customer {
            font-size: 12px;
            color: #6b7280;
            margin-top: 4px;
        }

        .order-price {
            font-size: 13px;
            font-weight: 600;
            color: #111827;
            text-align: right;
        }

        .order-status {
            font-size: 11px;
            margin-top: 4px;
            color: #16a34a;
            text-align: right;
        }


        /* =========================
           LOW STOCK
        ========================= */

        .stock-table {
            width: 100%;
            border-collapse: collapse;
        }

        .stock-table th,
        .stock-table td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #f1f5f9;
            font-size: 13px;
        }

        .stock-table th {
            color: #6b7280;
            font-size: 12px;
            font-weight: 600;
        }

        .stock-danger {
            color: #dc2626;
            font-weight: 600;
        }

        .stock-warning {
            color: #d97706;
            font-weight: 600;
        }


        /* =========================
           FOOTER
        ========================= */

        .footer {
            border-top: 1px solid #e5e7eb;
            background: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            color: #6b7280;
            font-size: 12px;
        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 1100px) {

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 800px) {

            .sidebar {
                width: 70px;
            }

            .sidebar-logo {
                justify-content: center;
                padding: 0;
            }

            .sidebar-logo a {
                font-size: 18px;
            }

            .sidebar-logo a span {
                display: none;
            }

            .menu-title,
            .menu-item a span {
                display: none;
            }

            .menu-item a {
                justify-content: center;
                padding: 13px;
            }

            .main-wrapper {
                margin-left: 70px;
            }

            .topbar {
                padding: 0 20px;
            }

            .profile-info {
                display: none;
            }
        }

        @media (max-width: 600px) {

            .content {
                padding: 20px 15px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .topbar {
                padding: 0 15px;
            }

            .page-title {
                font-size: 17px;
            }

            .footer {
                flex-direction: column;
                gap: 8px;
                padding: 15px;
            }
        }

    </style>

    @stack('styles')

</head>


<body>


    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar">

        <div class="sidebar-logo">

            <a href="{{ route('dashboard') }}">
                Shop<span>Mate</span>
            </a>

        </div>


        <div class="sidebar-menu">

            <div class="menu-title">
                Main
            </div>


            <div class="menu-item">

                <a
                    href="{{ route('dashboard') }}"
                    class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"
                >
                    <div class="menu-icon">⌂</div>
                    <span>Dashboard</span>
                </a>

            </div>


            <div class="menu-item">

                <a href="#">
                    <div class="menu-icon">▣</div>
                    <span>Products</span>
                </a>

            </div>


            <div class="menu-item">

                <a href="#">
                    <div class="menu-icon">▤</div>
                    <span>Categories</span>
                </a>

            </div>


            <div class="menu-item">

                <a href="#">
                    <div class="menu-icon">🛒</div>
                    <span>Orders</span>
                </a>

            </div>


            <div class="menu-item">

                <a href="#">
                    <div class="menu-icon">♙</div>
                    <span>Customers</span>
                </a>

            </div>


            <div class="menu-item">

                <a href="#">
                    <div class="menu-icon">▥</div>
                    <span>Inventory</span>
                </a>

            </div>


            <div class="menu-item">

                <a href="#">
                    <div class="menu-icon">🚚</div>
                    <span>Suppliers</span>
                </a>

            </div>


            <div class="menu-item">

                <a href="#">
                    <div class="menu-icon">▤</div>
                    <span>Purchase Orders</span>
                </a>

            </div>


            <div class="menu-item">

                <a href="#">
                    <div class="menu-icon">₹</div>
                    <span>Payments</span>
                </a>

            </div>


            <div class="menu-divider"></div>


            <div class="menu-title">
                Management
            </div>


            <div class="menu-item">

                <a href="#">
                    <div class="menu-icon">♙</div>
                    <span>Employees</span>
                </a>

            </div>


            <div class="menu-item">

                <a href="#">
                    <div class="menu-icon">🔔</div>
                    <span>Notifications</span>
                </a>

            </div>


            <div class="menu-item">

                <a href="#">
                    <div class="menu-icon">⚙</div>
                    <span>Settings</span>
                </a>

            </div>

        </div>

    </aside>



    <!-- =========================
         MAIN WRAPPER
    ========================== -->

    <div class="main-wrapper">


        <!-- =========================
             TOPBAR
        ========================== -->

        <header class="topbar">

            <div class="topbar-left">

                <div class="page-title">
                    @yield('page-title', 'Dashboard')
                </div>

            </div>


            <div class="topbar-right">


                <!-- Notification -->

                <div class="notification">

                    🔔

                    <span class="notification-badge">
                        3
                    </span>

                </div>


                <!-- Profile -->

                <div class="profile">

                    <div class="profile-avatar">

                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}

                    </div>


                    <div class="profile-info">

                        <div class="profile-name">

                            {{ auth()->user()->name ?? 'User' }}

                        </div>

                        <div class="profile-company">

                            {{ auth()->user()->company->name ?? 'Company' }}

                        </div>

                    </div>

                </div>

            </div>

        </header>



        <!-- =========================
             PAGE CONTENT
        ========================== -->

        <main class="content">

            @yield('content')

        </main>



        <!-- =========================
             FOOTER
        ========================== -->

        <footer class="footer">

            <div>
                © {{ date('Y') }} ShopMate. All rights reserved.
            </div>

            <div>
                ShopMate Business Management System
            </div>

        </footer>


    </div>


    @stack('scripts')

</body>

</html>