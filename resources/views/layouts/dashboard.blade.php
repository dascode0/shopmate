<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        @yield('title', 'Dashboard') - ShopMate
    </title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --green-dark: #063d2d;
            --green-dark-2: #07513b;
            --green: #07965f;
            --green-light: #e9f8f1;
            --green-soft: #f4fbf8;

            --text-dark: #17221d;
            --text: #435149;
            --text-light: #84918b;

            --border: #e5ece9;
            --bg: #f7faf9;
            --white: #ffffff;

            --danger: #e05252;
            --danger-bg: #fff1f1;

            --warning: #d89422;
            --warning-bg: #fff8e9;

            --sidebar-width: 238px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: var(--bg);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        button,
        input {
            font-family: inherit;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* =========================================
           APP
        ========================================= */

        .app {
            min-height: 100vh;
            display: flex;
        }

        /* =========================================
           SIDEBAR
        ========================================= */

        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;

            position: fixed;
            left: 0;
            top: 0;

            background:
                linear-gradient(
                    180deg,
                    #063d2d 0%,
                    #043528 100%
                );

            color: white;

            z-index: 1000;

            display: flex;
            flex-direction: column;

            transition: transform 0.25s ease;
        }

        .sidebar-brand {
            height: 74px;

            padding: 0 20px;

            display: flex;
            align-items: center;

            border-bottom:
                1px solid rgba(255,255,255,0.07);
        }

        .brand-icon {
            width: 34px;
            height: 34px;

            border-radius: 9px;

            background: white;
            color: var(--green);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 17px;
            font-weight: 800;

            margin-right: 9px;
        }

        .brand-name {
            font-size: 19px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .brand-name span {
            color: #58dda1;
        }

        /* User mini profile */

        .sidebar-user {
            padding: 18px 16px;

            border-bottom:
                1px solid rgba(255,255,255,0.07);
        }

        .user-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 36px;
            height: 36px;

            border-radius: 50%;

            background: #d8f5e8;
            color: var(--green);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 13px;
            font-weight: 800;

            flex-shrink: 0;
        }

        .user-details {
            min-width: 0;
        }

        .user-details strong {
            display: block;

            font-size: 12px;
            color: white;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .user-details span {
            display: block;

            font-size: 10px;
            color: #8db7a7;

            margin-top: 3px;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Navigation */

        .sidebar-nav {
            flex: 1;

            padding: 16px 10px;

            overflow-y: auto;
        }

        .nav-label {
            color: #6d9d8b;

            font-size: 9px;
            font-weight: 700;

            text-transform: uppercase;
            letter-spacing: 1px;

            padding: 0 10px;
            margin: 7px 0 9px;
        }

        .nav-item {
            width: 100%;

            display: flex;
            align-items: center;

            gap: 11px;

            padding: 10px 11px;

            border-radius: 7px;

            color: #a8c7ba;

            font-size: 12px;

            margin-bottom: 3px;

            transition:
                background 0.2s ease,
                color 0.2s ease;
        }

        .nav-icon {
            width: 18px;

            text-align: center;

            font-size: 13px;
        }

        .nav-item:hover {
            background: rgba(255,255,255,0.07);
            color: white;
        }

        .nav-item.active {
            background: #07965f;
            color: white;

            box-shadow:
                0 5px 15px rgba(0,0,0,0.12);
        }

        /* Sidebar bottom */

        .sidebar-footer {
            padding: 12px 10px 15px;

            border-top:
                1px solid rgba(255,255,255,0.07);
        }

        .logout-button {
            width: 100%;

            border: 0;
            background: transparent;

            color: #9bbbad;

            display: flex;
            align-items: center;

            gap: 11px;

            padding: 10px 11px;

            border-radius: 7px;

            cursor: pointer;

            font-size: 12px;

            text-align: left;
        }

        .logout-button:hover {
            background: rgba(255,255,255,0.07);
            color: white;
        }

        /* =========================================
           MAIN
        ========================================= */

        .main {
            width: calc(100% - var(--sidebar-width));
            margin-left: var(--sidebar-width);

            min-height: 100vh;
        }

        /* =========================================
           TOPBAR
        ========================================= */

        .topbar {
            height: 74px;

            background: white;

            border-bottom:
                1px solid var(--border);

            display: flex;
            align-items: center;

            justify-content: space-between;

            padding: 0 28px;

            position: sticky;
            top: 0;

            z-index: 900;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .mobile-menu {
            display: none;

            width: 36px;
            height: 36px;

            border: 1px solid var(--border);

            border-radius: 8px;

            background: white;

            cursor: pointer;

            font-size: 17px;
        }

        .page-heading h1 {
            font-size: 19px;
            color: var(--text-dark);

            letter-spacing: -0.4px;
        }

        .page-heading p {
            color: var(--text-light);

            font-size: 10px;

            margin-top: 4px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        /* Search */

        .search-box {
            width: 210px;
            height: 36px;

            border: 1px solid var(--border);
            border-radius: 8px;

            display: flex;
            align-items: center;

            padding: 0 11px;

            background: #fbfdfc;
        }

        .search-box span {
            color: #9aa8a1;
            font-size: 13px;
        }

        .search-box input {
            border: 0;
            outline: 0;

            width: 100%;

            margin-left: 8px;

            background: transparent;

            font-size: 11px;
        }

        .search-box input::placeholder {
            color: #a7b1ac;
        }

        /* Top icons */

        .top-icon {
            width: 34px;
            height: 34px;

            border: 0;

            background: transparent;

            border-radius: 8px;

            cursor: pointer;

            color: #66756e;

            position: relative;
        }

        .top-icon:hover {
            background: var(--green-light);
            color: var(--green);
        }

        .notification-dot {
            width: 6px;
            height: 6px;

            background: #e05252;

            border-radius: 50%;

            position: absolute;

            top: 7px;
            right: 7px;
        }

        /* User */

        .top-user {
            display: flex;
            align-items: center;

            gap: 8px;

            padding-left: 5px;
        }

        .top-avatar {
            width: 32px;
            height: 32px;

            border-radius: 50%;

            background: #dff5ea;

            color: var(--green);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 11px;
            font-weight: 800;
        }

        .top-user-info strong {
            display: block;

            font-size: 11px;
            color: var(--text-dark);
        }

        .top-user-info span {
            display: block;

            font-size: 9px;
            color: var(--text-light);

            margin-top: 2px;
        }

        /* =========================================
           CONTENT
        ========================================= */

        .content {
            padding: 26px 28px 30px;
        }

        /* =========================================
           MOBILE OVERLAY
        ========================================= */

        .sidebar-overlay {
            display: none;

            position: fixed;

            inset: 0;

            background: rgba(0,0,0,0.35);

            z-index: 950;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 1100px) {

            :root {
                --sidebar-width: 220px;
            }

            .search-box {
                width: 170px;
            }

            .content {
                padding: 23px 20px;
            }

        }

        @media (max-width: 850px) {

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .sidebar-overlay.show {
                display: block;
            }

            .main {
                width: 100%;
                margin-left: 0;
            }

            .mobile-menu {
                display: block;
            }

            .topbar {
                padding: 0 18px;
            }

            .search-box {
                display: none;
            }

            .top-user-info {
                display: none;
            }

        }

        @media (max-width: 600px) {

            .topbar {
                height: 64px;
            }

            .page-heading h1 {
                font-size: 17px;
            }

            .page-heading p {
                display: none;
            }

            .topbar-right {
                gap: 4px;
            }

            .top-icon {
                width: 32px;
                height: 32px;
            }

            .content {
                padding: 18px 14px 25px;
            }

        }

        @media (max-width: 380px) {

            .top-user {
                display: none;
            }

            .topbar-left {
                gap: 9px;
            }

        }

        @yield('additional-css')
    </style>

    @stack('styles')

</head>

<body>

<div class="app">

    {{-- SIDEBAR --}}
    <aside class="sidebar" id="sidebar">

        <div class="sidebar-brand">

            <div class="brand-icon">
                🛍
            </div>

            <div class="brand-name">
                Shop<span>Mate</span>
            </div>

        </div>


        {{-- USER --}}
        <div class="sidebar-user">

            <div class="user-box">

                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>

                <div class="user-details">

                    <strong>
                        {{ auth()->user()->name ?? 'User' }}
                    </strong>

                    <span>
                        Company Admin
                    </span>

                </div>

            </div>

        </div>


        {{-- NAVIGATION --}}
        <nav class="sidebar-nav">

            <div class="nav-label">
                Main Menu
            </div>


            <a
                href="{{ route('dashboard') }}"
                class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}"
            >
                <span class="nav-icon">⌂</span>
                <span>Dashboard</span>
            </a>


            <a href="#" class="nav-item">
                <span class="nav-icon">▣</span>
                <span>Products</span>
            </a>


            <a href="#" class="nav-item">
                <span class="nav-icon">◫</span>
                <span>Categories</span>
            </a>


            <a href="#" class="nav-item">
                <span class="nav-icon">▤</span>
                <span>Orders</span>
            </a>


            <a href="#" class="nav-item">
                <span class="nav-icon">♙</span>
                <span>Customers</span>
            </a>


            <a href="#" class="nav-item">
                <span class="nav-icon">▥</span>
                <span>Inventory</span>
            </a>


            <a href="#" class="nav-item">
                <span class="nav-icon">▱</span>
                <span>Suppliers</span>
            </a>


            <a href="#" class="nav-item">
                <span class="nav-icon">▤</span>
                <span>Purchase Orders</span>
            </a>


            <a href="#" class="nav-item">
                <span class="nav-icon">◉</span>
                <span>Payments</span>
            </a>


            <div class="nav-label">
                Management
            </div>


            <a href="#" class="nav-item">
                <span class="nav-icon">♙</span>
                <span>Employees</span>
            </a>


            <a href="#" class="nav-item">
                <span class="nav-icon">▥</span>
                <span>Reports</span>
            </a>


            <a href="#" class="nav-item">
                <span class="nav-icon">⌁</span>
                <span>API Developers</span>
            </a>


            <a href="#" class="nav-item">
                <span class="nav-icon">⚙</span>
                <span>Settings</span>
            </a>

        </nav>


        {{-- LOGOUT --}}
        <div class="sidebar-footer">

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >
                    <span class="nav-icon">↪</span>
                    <span>Logout</span>
                </button>

            </form>

        </div>

    </aside>


    {{-- MOBILE OVERLAY --}}
    <div
        class="sidebar-overlay"
        id="sidebarOverlay"
        onclick="closeSidebar()"
    ></div>


    {{-- MAIN --}}
    <main class="main">

        {{-- TOPBAR --}}
        <header class="topbar">

            <div class="topbar-left">

                <button
                    type="button"
                    class="mobile-menu"
                    onclick="toggleSidebar()"
                    aria-label="Open menu"
                >
                    ☰
                </button>


                <div class="page-heading">

                    <h1>
                        @yield('page-title', 'Dashboard')
                    </h1>

                    <p>
                        Manage your business from one place.
                    </p>

                </div>

            </div>


            <div class="topbar-right">

                {{-- Search --}}
                <div class="search-box">

                    <span>⌕</span>

                    <input
                        type="text"
                        placeholder="Search anything..."
                    >

                </div>


                {{-- Notification --}}
                <button
                    type="button"
                    class="top-icon"
                    title="Notifications"
                >
                    ♧

                    <span class="notification-dot"></span>
                </button>


                {{-- Settings --}}
                <button
                    type="button"
                    class="top-icon"
                    title="Settings"
                >
                    ⚙
                </button>


                {{-- User --}}
                <div class="top-user">

                    <div class="top-avatar">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </div>

                    <div class="top-user-info">

                        <strong>
                            {{ auth()->user()->name ?? 'User' }}
                        </strong>

                        <span>
                            {{ auth()->user()->company->name ?? 'Company' }}
                        </span>

                    </div>

                </div>

            </div>

        </header>


        {{-- PAGE CONTENT --}}
        <section class="content">

            @yield('content')

        </section>

    </main>

</div>


<script>

    function toggleSidebar() {

        const sidebar =
            document.getElementById('sidebar');

        const overlay =
            document.getElementById('sidebarOverlay');

        sidebar.classList.toggle('open');

        overlay.classList.toggle('show');
    }


    function closeSidebar() {

        const sidebar =
            document.getElementById('sidebar');

        const overlay =
            document.getElementById('sidebarOverlay');

        sidebar.classList.remove('open');

        overlay.classList.remove('show');
    }


    /*
     * Close mobile sidebar when clicking a navigation link.
     */
    document.querySelectorAll('.nav-item').forEach(function(item) {

        item.addEventListener('click', function() {

            if (window.innerWidth <= 850) {
                closeSidebar();
            }

        });

    });

</script>

@stack('scripts')

</body>
</html>