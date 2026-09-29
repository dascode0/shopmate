<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ShopMate - E-commerce Management Platform</title>

    <meta
        name="description"
        content="ShopMate helps businesses manage products, orders, inventory, customers and e-commerce operations from one powerful platform."
    >

    <style>
        /* =========================================================
           RESET
        ========================================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            background: #ffffff;
            color: #17211b;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            max-width: 100%;
            display: block;
        }

        button {
            font: inherit;
        }

        .container {
            width: min(1180px, calc(100% - 40px));
            margin: 0 auto;
        }

        /* =========================================================
           COLORS
        ========================================================= */

        :root {
            --primary: #16a66a;
            --primary-dark: #087f50;
            --primary-light: #e9faf2;

            --teal: #0f766e;

            --dark: #122019;
            --text: #526158;
            --muted: #7b8881;

            --white: #ffffff;
            --border: #e5ebe7;

            --section-bg: #f7faf8;
        }

        /* =========================================================
           HEADER
        ========================================================= */

        .header {
            position: sticky;
            top: 0;
            z-index: 1000;

            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(14px);

            border-bottom: 1px solid rgba(229, 235, 231, 0.8);
        }

        .navbar {
            min-height: 76px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
        }

        /* Logo */

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;

            font-size: 23px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .logo-icon {
            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background: linear-gradient(
                135deg,
                #19b879,
                #0f8c69
            );

            color: white;

            font-size: 20px;
            font-weight: 800;

            box-shadow: 0 7px 18px rgba(15, 140, 105, 0.2);
        }

        .logo span {
            color: var(--dark);
        }

        .logo strong {
            color: var(--primary);
        }

        /* Navigation */

        .nav-links {
            display: flex;
            align-items: center;
            gap: 32px;

            color: #526158;
            font-size: 14px;
            font-weight: 600;
        }

        .nav-links a {
            transition: 0.2s ease;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-height: 44px;
            padding: 0 20px;

            border-radius: 10px;

            font-size: 14px;
            font-weight: 700;

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-outline {
            border: 1px solid var(--border);
            background: white;
            color: var(--dark);
        }

        .btn-outline:hover {
            border-color: #cdd8d1;
            box-shadow: 0 6px 18px rgba(20, 40, 30, 0.06);
        }

        .btn-primary {
            background: linear-gradient(
                135deg,
                var(--primary),
                var(--teal)
            );

            color: white;

            box-shadow: 0 8px 20px rgba(16, 155, 104, 0.2);
        }

        .btn-primary:hover {
            box-shadow: 0 12px 26px rgba(16, 155, 104, 0.28);
        }

        /* Mobile menu */

        .mobile-menu-btn {
            display: none;

            width: 42px;
            height: 42px;

            border: 1px solid var(--border);
            border-radius: 10px;

            background: white;

            cursor: pointer;
        }

        .mobile-menu-btn span {
            display: block;

            width: 20px;
            height: 2px;

            margin: 4px auto;

            background: var(--dark);
        }

        /* =========================================================
           HERO
        ========================================================= */

        .hero {
            position: relative;
            overflow: hidden;

            padding: 90px 0 100px;

            background:
                radial-gradient(
                    circle at 80% 25%,
                    rgba(22, 166, 106, 0.13),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 10% 20%,
                    rgba(15, 118, 110, 0.08),
                    transparent 28%
                ),
                #ffffff;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;

            align-items: center;

            gap: 70px;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 7px 12px;

            border: 1px solid #cceee0;
            border-radius: 999px;

            background: var(--primary-light);

            color: var(--primary-dark);

            font-size: 12px;
            font-weight: 700;

            margin-bottom: 22px;
        }

        .badge-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: var(--primary);
        }

        .hero h1 {
            max-width: 680px;

            font-size: clamp(42px, 5vw, 68px);
            line-height: 1.04;

            letter-spacing: -2.8px;

            color: var(--dark);

            margin-bottom: 24px;
        }

        .hero h1 .highlight {
            color: var(--primary);
        }

        .hero-description {
            max-width: 590px;

            font-size: 17px;
            line-height: 1.8;

            color: var(--text);

            margin-bottom: 32px;
        }

        .hero-buttons {
            display: flex;
            align-items: center;
            gap: 14px;

            margin-bottom: 35px;
        }

        .hero-note {
            display: flex;
            align-items: center;
            gap: 9px;

            color: var(--muted);

            font-size: 13px;
        }

        .check {
            width: 20px;
            height: 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 12px;
            font-weight: 800;
        }

        /* Hero Dashboard */

        .hero-visual {
            position: relative;
        }

        .dashboard-window {
            position: relative;

            background: #ffffff;

            border: 1px solid #dfe8e3;
            border-radius: 18px;

            padding: 13px;

            box-shadow:
                0 30px 70px rgba(25, 60, 42, 0.12),
                0 10px 25px rgba(25, 60, 42, 0.06);

            transform: rotate(1deg);
        }

        .window-bar {
            height: 38px;

            display: flex;
            align-items: center;

            padding: 0 10px;

            border-bottom: 1px solid var(--border);

            margin-bottom: 12px;
        }

        .window-dots {
            display: flex;
            gap: 5px;
        }

        .window-dots span {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #d7dfda;
        }

        .dashboard-body {
            display: grid;
            grid-template-columns: 145px 1fr;

            min-height: 390px;

            overflow: hidden;

            border-radius: 10px;

            background: #f7faf8;
        }

        .fake-sidebar {
            padding: 18px 12px;

            background: #11231b;
        }

        .fake-brand {
            color: white;
            font-weight: 800;
            font-size: 13px;

            margin-bottom: 25px;
        }

        .fake-nav-item {
            height: 31px;

            display: flex;
            align-items: center;

            padding: 0 9px;

            border-radius: 7px;

            color: #9caea4;

            font-size: 10px;

            margin-bottom: 6px;
        }

        .fake-nav-item.active {
            color: white;
            background: rgba(255,255,255,0.1);
        }

        .fake-content {
            padding: 18px;
        }

        .fake-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 17px;
        }

        .fake-title {
            width: 110px;
            height: 10px;

            border-radius: 10px;

            background: #b8c9bf;
        }

        .fake-avatar {
            width: 26px;
            height: 26px;

            border-radius: 50%;

            background: #cdeee0;
        }

        .fake-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);

            gap: 9px;

            margin-bottom: 12px;
        }

        .fake-card {
            min-height: 75px;

            padding: 11px;

            border: 1px solid #e3ebe6;
            border-radius: 8px;

            background: white;
        }

        .fake-small-line {
            width: 40px;
            height: 6px;

            border-radius: 5px;

            background: #d9e3dd;

            margin-bottom: 9px;
        }

        .fake-big-line {
            width: 60px;
            height: 11px;

            border-radius: 5px;

            background: #7eb69c;
        }

        .fake-chart {
            height: 145px;

            display: flex;
            align-items: end;
            gap: 8px;

            padding: 15px;

            border: 1px solid #e3ebe6;
            border-radius: 8px;

            background: white;

            margin-bottom: 12px;
        }

        .fake-bar {
            flex: 1;

            border-radius: 5px 5px 2px 2px;

            background: #b5e3cd;
        }

        .fake-bar:nth-child(1) { height: 35%; }
        .fake-bar:nth-child(2) { height: 55%; }
        .fake-bar:nth-child(3) { height: 45%; }
        .fake-bar:nth-child(4) { height: 70%; }
        .fake-bar:nth-child(5) { height: 60%; }
        .fake-bar:nth-child(6) { height: 85%; }
        .fake-bar:nth-child(7) { height: 76%; }
        .fake-bar:nth-child(8) { height: 95%; }

        .fake-orders {
            display: grid;
            grid-template-columns: 1fr 1fr;

            gap: 12px;
        }

        .fake-order-box {
            height: 80px;

            border-radius: 8px;

            background: white;
            border: 1px solid #e3ebe6;
        }

        /* Floating cards */

        .floating-card {
            position: absolute;

            padding: 14px 16px;

            border-radius: 12px;

            background: white;

            border: 1px solid #e3ebe6;

            box-shadow: 0 18px 40px rgba(25, 60, 42, 0.13);

            display: flex;
            align-items: center;
            gap: 11px;
        }

        .floating-card.stock {
            left: -35px;
            bottom: 45px;
        }

        .floating-card.orders {
            right: -25px;
            top: 90px;
        }

        .floating-icon {
            width: 35px;
            height: 35px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 9px;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 16px;
        }

        .floating-card small {
            display: block;

            color: var(--muted);
            font-size: 10px;
        }

        .floating-card strong {
            display: block;

            color: var(--dark);
            font-size: 13px;
        }

        /* =========================================================
           TRUST
        ========================================================= */

        .trust {
            padding: 25px 0;

            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);

            background: #ffffff;
        }

        .trust-inner {
            display: flex;
            align-items: center;
            justify-content: center;

            gap: 50px;

            color: #93a098;
        }

        .trust-text {
            font-size: 12px;
            font-weight: 600;
        }

        .trust-item {
            font-size: 14px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        /* =========================================================
           SECTION COMMON
        ========================================================= */

        .section {
            padding: 100px 0;
        }

        .section-light {
            background: var(--section-bg);
        }

        .section-heading {
            max-width: 700px;

            margin: 0 auto 55px;

            text-align: center;
        }

        .eyebrow {
            display: inline-block;

            margin-bottom: 12px;

            color: var(--primary-dark);

            font-size: 12px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .section-heading h2 {
            font-size: clamp(30px, 4vw, 44px);

            line-height: 1.15;

            letter-spacing: -1.5px;

            color: var(--dark);

            margin-bottom: 16px;
        }

        .section-heading p {
            color: var(--text);

            font-size: 15px;
            line-height: 1.8;
        }

        /* =========================================================
           FEATURES
        ========================================================= */

        .features-grid {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 20px;
        }

        .feature-card {
            padding: 28px;

            border: 1px solid var(--border);
            border-radius: 15px;

            background: white;

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);

            box-shadow: 0 18px 35px rgba(25, 60, 42, 0.08);
        }

        .feature-icon {
            width: 46px;
            height: 46px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background: var(--primary-light);
            color: var(--primary);

            margin-bottom: 20px;

            font-size: 19px;
            font-weight: 800;
        }

        .feature-card h3 {
            margin-bottom: 9px;

            color: var(--dark);

            font-size: 17px;
        }

        .feature-card p {
            color: var(--text);

            font-size: 13px;
            line-height: 1.7;
        }

        /* =========================================================
           HOW IT WORKS
        ========================================================= */

        .steps {
            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 25px;
        }

        .step {
            position: relative;

            padding: 30px;

            border-radius: 15px;

            background: white;

            border: 1px solid var(--border);
        }

        .step-number {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: var(--dark);
            color: white;

            font-size: 13px;
            font-weight: 800;

            margin-bottom: 22px;
        }

        .step h3 {
            font-size: 17px;

            color: var(--dark);

            margin-bottom: 9px;
        }

        .step p {
            color: var(--text);

            font-size: 13px;
            line-height: 1.7;
        }

        /* =========================================================
           API SECTION
        ========================================================= */

        .api-section {
            overflow: hidden;
        }

        .api-grid {
            display: grid;

            grid-template-columns: 0.9fr 1.1fr;

            gap: 70px;

            align-items: center;
        }

        .api-content h2 {
            font-size: clamp(30px, 4vw, 45px);

            line-height: 1.15;

            letter-spacing: -1.5px;

            color: var(--dark);

            margin-bottom: 18px;
        }

        .api-content p {
            color: var(--text);

            font-size: 15px;

            line-height: 1.8;

            margin-bottom: 25px;
        }

        .api-list {
            list-style: none;

            margin-bottom: 30px;
        }

        .api-list li {
            display: flex;
            align-items: center;
            gap: 10px;

            margin-bottom: 11px;

            color: #405047;

            font-size: 13px;
        }

        .api-list li span {
            width: 19px;
            height: 19px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: var(--primary-light);
            color: var(--primary);

            font-size: 10px;
        }

        /* Code card */

        .code-window {
            overflow: hidden;

            border-radius: 16px;

            background: #101a15;

            box-shadow: 0 25px 55px rgba(16, 35, 25, 0.18);
        }

        .code-header {
            height: 48px;

            display: flex;
            align-items: center;

            padding: 0 18px;

            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .code-dots {
            display: flex;
            gap: 6px;
        }

        .code-dots span {
            width: 8px;
            height: 8px;

            border-radius: 50%;

            background: #47564e;
        }

        .code-title {
            margin-left: auto;
            margin-right: auto;

            color: #829087;

            font-size: 11px;
        }

        .code-body {
            padding: 25px;

            overflow-x: auto;
        }

        .code-body pre {
            color: #d6e2da;

            font-family:
                "SFMono-Regular",
                Consolas,
                "Liberation Mono",
                monospace;

            font-size: 12px;

            line-height: 1.9;
        }

        .code-green {
            color: #62d6a1;
        }

        .code-blue {
            color: #82b9ff;
        }

        .code-yellow {
            color: #e9cb78;
        }

        /* =========================================================
           CTA
        ========================================================= */

        .cta-section {
            padding: 100px 0;
        }

        .cta-box {
            position: relative;

            overflow: hidden;

            padding: 65px 40px;

            border-radius: 22px;

            background:
                radial-gradient(
                    circle at 90% 10%,
                    rgba(82, 224, 158, 0.24),
                    transparent 25%
                ),
                linear-gradient(
                    135deg,
                    #10251c,
                    #0d4b35
                );

            text-align: center;

            color: white;
        }

        .cta-box h2 {
            max-width: 650px;

            margin: 0 auto 15px;

            font-size: clamp(30px, 4vw, 46px);

            line-height: 1.15;

            letter-spacing: -1.5px;
        }

        .cta-box p {
            max-width: 570px;

            margin: 0 auto 28px;

            color: #bdd0c6;

            font-size: 14px;
        }

        .cta-box .btn-primary {
            background: white;
            color: var(--primary-dark);

            box-shadow: none;
        }

        /* =========================================================
           FOOTER
        ========================================================= */

        .footer {
            padding: 60px 0 25px;

            border-top: 1px solid var(--border);

            background: #fbfcfb;
        }

        .footer-grid {
            display: grid;

            grid-template-columns: 1.6fr repeat(3, 1fr);

            gap: 45px;

            padding-bottom: 45px;
        }

        .footer-brand p {
            max-width: 300px;

            margin-top: 15px;

            color: var(--text);

            font-size: 13px;

            line-height: 1.7;
        }

        .footer-column h4 {
            margin-bottom: 16px;

            color: var(--dark);

            font-size: 13px;
        }

        .footer-column a {
            display: block;

            margin-bottom: 10px;

            color: var(--muted);

            font-size: 12px;
        }

        .footer-column a:hover {
            color: var(--primary);
        }

        .footer-bottom {
            padding-top: 22px;

            border-top: 1px solid var(--border);

            display: flex;
            justify-content: space-between;
            align-items: center;

            color: var(--muted);

            font-size: 11px;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1050px) {

            .nav-links {
                gap: 20px;
            }

            .hero-grid {
                gap: 45px;
            }

            .floating-card.stock {
                left: -15px;
            }

            .floating-card.orders {
                right: -10px;
            }
        }

        @media (max-width: 900px) {

            .nav-links,
            .nav-actions {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .navbar.mobile-open {
                flex-wrap: wrap;
            }

            .navbar.mobile-open .nav-links {
                display: flex;

                width: 100%;

                flex-direction: column;

                align-items: flex-start;

                padding: 15px 0 20px;

                gap: 16px;
            }

            .navbar.mobile-open .nav-actions {
                display: flex;

                width: 100%;

                padding-bottom: 15px;
            }

            .hero {
                padding: 70px 0 80px;
            }

            .hero-grid,
            .api-grid {
                grid-template-columns: 1fr;
            }

            .hero-content {
                text-align: center;
            }

            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-note {
                justify-content: center;
            }

            .hero-visual {
                max-width: 700px;
                width: 100%;
                margin: 20px auto 0;
            }

            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .steps {
                grid-template-columns: 1fr;
            }

            .api-content {
                text-align: center;
            }

            .api-list {
                display: inline-block;
                text-align: left;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {

            .container {
                width: min(100% - 28px, 1180px);
            }

            .navbar {
                min-height: 68px;
            }

            .logo {
                font-size: 20px;
            }

            .logo-icon {
                width: 36px;
                height: 36px;
            }

            .hero {
                padding: 55px 0 65px;
            }

            .hero h1 {
                font-size: 42px;
                letter-spacing: -1.8px;
            }

            .hero-description {
                font-size: 15px;
            }

            .hero-buttons {
                flex-direction: column;

                align-items: stretch;
            }

            .hero-buttons .btn {
                width: 100%;
            }

            .dashboard-body {
                grid-template-columns: 1fr;
            }

            .fake-sidebar {
                display: none;
            }

            .floating-card {
                display: none;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .section {
                padding: 70px 0;
            }

            .section-heading {
                margin-bottom: 38px;
            }

            .trust-inner {
                gap: 18px;
                flex-wrap: wrap;
            }

            .trust-text {
                width: 100%;
                text-align: center;
            }

            .api-grid {
                gap: 35px;
            }

            .code-body {
                padding: 18px;
            }

            .code-body pre {
                font-size: 10px;
            }

            .cta-section {
                padding: 70px 0;
            }

            .cta-box {
                padding: 50px 22px;
                border-radius: 16px;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;

                gap: 30px;
            }

            .footer-brand {
                grid-column: 1 / -1;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 8px;

                text-align: center;
            }
        }

        @media (max-width: 400px) {

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .footer-brand {
                grid-column: auto;
            }

            .hero h1 {
                font-size: 37px;
            }
        }
    </style>
</head>

<body>

    <!-- =========================================================
         HEADER
    ========================================================== -->

    <header class="header">

        <div class="container">

            <nav class="navbar" id="navbar">

                <a href="{{ url('/') }}" class="logo">

                    <div class="logo-icon">
                        M
                    </div>

                    <span>
                        Shop<strong>Mate</strong>
                    </span>

                </a>


                <div class="nav-links">

                    <a href="#features">
                        Features
                    </a>

                    <a href="#how-it-works">
                        How It Works
                    </a>

                    <a href="#api">
                        API
                    </a>

                    <a href="#about">
                        About
                    </a>

                </div>


                <div class="nav-actions">

                    <a
                        href="{{ route('login') }}"
                        class="btn btn-outline"
                    >
                        Login
                    </a>

                    <a
                        href="{{ route('register') }}"
                        class="btn btn-primary"
                    >
                        Get Started
                    </a>

                </div>


                <button
                    type="button"
                    class="mobile-menu-btn"
                    id="mobileMenuBtn"
                    aria-label="Open navigation menu"
                >

                    <span></span>
                    <span></span>
                    <span></span>

                </button>

            </nav>

        </div>

    </header>


    <!-- =========================================================
         HERO
    ========================================================== -->

    <main>

        <section class="hero">

            <div class="container">

                <div class="hero-grid">


                    <!-- Hero Content -->

                    <div class="hero-content">

                        <div class="hero-badge">

                            <span class="badge-dot"></span>

                            E-commerce Management Platform

                        </div>


                        <h1>

                            Manage your business

                            <span class="highlight">
                                smarter.
                            </span>

                        </h1>


                        <p class="hero-description">

                            ShopMate brings products, customers, orders,
                            inventory and business operations together in
                            one simple platform.

                        </p>


                        <div class="hero-buttons">

                            <a
                                href="{{ route('register') }}"
                                class="btn btn-primary"
                            >
                                Start Your Business
                                →
                            </a>

                            <a
                                href="#features"
                                class="btn btn-outline"
                            >
                                Explore Features
                            </a>

                        </div>


                        <div class="hero-note">

                            <span class="check">
                                ✓
                            </span>

                            Built for growing businesses

                        </div>

                    </div>


                    <!-- Dashboard Preview -->

                    <div class="hero-visual">

                        <div class="dashboard-window">

                            <div class="window-bar">

                                <div class="window-dots">

                                    <span></span>
                                    <span></span>
                                    <span></span>

                                </div>

                            </div>


                            <div class="dashboard-body">

                                <aside class="fake-sidebar">

                                    <div class="fake-brand">
                                        ShopMate
                                    </div>

                                    <div class="fake-nav-item active">
                                        Dashboard
                                    </div>

                                    <div class="fake-nav-item">
                                        Products
                                    </div>

                                    <div class="fake-nav-item">
                                        Orders
                                    </div>

                                    <div class="fake-nav-item">
                                        Customers
                                    </div>

                                    <div class="fake-nav-item">
                                        Inventory
                                    </div>

                                    <div class="fake-nav-item">
                                        Suppliers
                                    </div>

                                    <div class="fake-nav-item">
                                        Reports
                                    </div>

                                </aside>


                                <div class="fake-content">

                                    <div class="fake-top">

                                        <div class="fake-title"></div>

                                        <div class="fake-avatar"></div>

                                    </div>


                                    <div class="fake-stats">

                                        <div class="fake-card">

                                            <div class="fake-small-line"></div>

                                            <div class="fake-big-line"></div>

                                        </div>

                                        <div class="fake-card">

                                            <div class="fake-small-line"></div>

                                            <div class="fake-big-line"></div>

                                        </div>

                                        <div class="fake-card">

                                            <div class="fake-small-line"></div>

                                            <div class="fake-big-line"></div>

                                        </div>

                                    </div>


                                    <div class="fake-chart">

                                        <div class="fake-bar"></div>
                                        <div class="fake-bar"></div>
                                        <div class="fake-bar"></div>
                                        <div class="fake-bar"></div>
                                        <div class="fake-bar"></div>
                                        <div class="fake-bar"></div>
                                        <div class="fake-bar"></div>
                                        <div class="fake-bar"></div>

                                    </div>


                                    <div class="fake-orders">

                                        <div class="fake-order-box"></div>

                                        <div class="fake-order-box"></div>

                                    </div>

                                </div>

                            </div>

                        </div>


                        <div class="floating-card stock">

                            <div class="floating-icon">
                                ✓
                            </div>

                            <div>

                                <small>
                                    Inventory
                                </small>

                                <strong>
                                    Stock Updated
                                </strong>

                            </div>

                        </div>


                        <div class="floating-card orders">

                            <div class="floating-icon">
                                +
                            </div>

                            <div>

                                <small>
                                    Orders
                                </small>

                                <strong>
                                    New Order
                                </strong>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- =====================================================
             TRUST
        ====================================================== -->

        <section class="trust">

            <div class="container">

                <div class="trust-inner">

                    <span class="trust-text">
                        Everything your business needs
                    </span>

                    <span class="trust-item">
                        PRODUCTS
                    </span>

                    <span class="trust-item">
                        ORDERS
                    </span>

                    <span class="trust-item">
                        INVENTORY
                    </span>

                    <span class="trust-item">
                        API
                    </span>

                </div>

            </div>

        </section>


        <!-- =====================================================
             FEATURES
        ====================================================== -->

        <section
            class="section section-light"
            id="features"
        >

            <div class="container">

                <div class="section-heading">

                    <span class="eyebrow">
                        Everything in one place
                    </span>

                    <h2>
                        Run your business without the mess.
                    </h2>

                    <p>
                        ShopMate gives your team the tools needed to
                        manage everyday e-commerce operations from
                        one centralized platform.
                    </p>

                </div>


                <div class="features-grid">


                    <article class="feature-card">

                        <div class="feature-icon">
                            P
                        </div>

                        <h3>
                            Product Management
                        </h3>

                        <p>
                            Create and manage products, categories,
                            pricing, stock and product information
                            from one place.
                        </p>

                    </article>


                    <article class="feature-card">

                        <div class="feature-icon">
                            O
                        </div>

                        <h3>
                            Order Management
                        </h3>

                        <p>
                            Track customer orders, order items,
                            payment status and order progress
                            through your business workflow.
                        </p>

                    </article>


                    <article class="feature-card">

                        <div class="feature-icon">
                            I
                        </div>

                        <h3>
                            Inventory Control
                        </h3>

                        <p>
                            Monitor stock levels and keep a history
                            of stock additions, reductions and
                            adjustments.
                        </p>

                    </article>


                    <article class="feature-card">

                        <div class="feature-icon">
                            C
                        </div>

                        <h3>
                            Customer Management
                        </h3>

                        <p>
                            Keep customer information and order
                            history organized in one centralized
                            system.
                        </p>

                    </article>


                    <article class="feature-card">

                        <div class="feature-icon">
                            S
                        </div>

                        <h3>
                            Supplier Management
                        </h3>

                        <p>
                            Manage suppliers, purchase orders and
                            incoming stock from a single dashboard.
                        </p>

                    </article>


                    <article class="feature-card">

                        <div class="feature-icon">
                            A
                        </div>

                        <h3>
                            Powerful API
                        </h3>

                        <p>
                            Connect external websites and applications
                            to your ShopMate business through secure
                            REST APIs.
                        </p>

                    </article>

                </div>

            </div>

        </section>


        <!-- =====================================================
             HOW IT WORKS
        ====================================================== -->

        <section
            class="section"
            id="how-it-works"
        >

            <div class="container">

                <div class="section-heading">

                    <span class="eyebrow">
                        Simple setup
                    </span>

                    <h2>
                        Start managing your business in three steps.
                    </h2>

                    <p>
                        ShopMate keeps the setup simple while handling
                        the complicated backend work for you.
                    </p>

                </div>


                <div class="steps">


                    <article class="step">

                        <div class="step-number">
                            01
                        </div>

                        <h3>
                            Create your account
                        </h3>

                        <p>
                            Register your personal and business
                            information in one simple registration
                            process.
                        </p>

                    </article>


                    <article class="step">

                        <div class="step-number">
                            02
                        </div>

                        <h3>
                            Set up your business
                        </h3>

                        <p>
                            ShopMate automatically prepares your
                            business environment and gives you a
                            dedicated workspace.
                        </p>

                    </article>


                    <article class="step">

                        <div class="step-number">
                            03
                        </div>

                        <h3>
                            Start managing
                        </h3>

                        <p>
                            Add products, manage inventory, process
                            orders and connect your external store
                            using the API.
                        </p>

                    </article>

                </div>

            </div>

        </section>


        <!-- =====================================================
             API
        ====================================================== -->

        <section
            class="section section-light api-section"
            id="api"
        >

            <div class="container">

                <div class="api-grid">


                    <div class="api-content">

                        <span class="eyebrow">
                            Built for integrations
                        </span>

                        <h2>
                            Connect your store with the ShopMate API.
                        </h2>

                        <p>
                            Use ShopMate as the business backend for
                            your website or application. Products,
                            customers and orders can communicate
                            through secure REST APIs.
                        </p>


                        <ul class="api-list">

                            <li>
                                <span>✓</span>
                                Secure API authentication
                            </li>

                            <li>
                                <span>✓</span>
                                Product API
                            </li>

                            <li>
                                <span>✓</span>
                                Customer and order API
                            </li>

                            <li>
                                <span>✓</span>
                                JSON responses
                            </li>

                            <li>
                                <span>✓</span>
                                Company-specific data isolation
                            </li>

                        </ul>


                        <a
                            href="{{ route('register') }}"
                            class="btn btn-primary"
                        >
                            Build With ShopMate
                            →
                        </a>

                    </div>


                    <div class="code-window">

                        <div class="code-header">

                            <div class="code-dots">

                                <span></span>
                                <span></span>
                                <span></span>

                            </div>

                            <div class="code-title">
                                GET /api/v1/products
                            </div>

                        </div>


                        <div class="code-body">

<pre><span class="code-blue">GET</span> /api/v1/products

Authorization:
<span class="code-yellow">Bearer</span> YOUR_API_KEY


{
    <span class="code-green">"data"</span>: [
        {
            <span class="code-green">"id"</span>: 1,
            <span class="code-green">"name"</span>: "Classic T-Shirt",
            <span class="code-green">"price"</span>: 799,
            <span class="code-green">"stock"</span>: 42
        },
        {
            <span class="code-green">"id"</span>: 2,
            <span class="code-green">"name"</span>: "Denim Jacket",
            <span class="code-green">"price"</span>: 1499,
            <span class="code-green">"stock"</span>: 18
        }
    ]
}</pre>

                        </div>

                    </div>

                </div>

            </div>

        </section>


        <!-- =====================================================
             CTA
        ====================================================== -->

        <section class="cta-section" id="about">

            <div class="container">

                <div class="cta-box">

                    <h2>
                        Your business. Your data. One powerful platform.
                    </h2>

                    <p>
                        Bring your products, orders, customers and
                        inventory together with ShopMate.
                    </p>

                    <a
                        href="{{ route('register') }}"
                        class="btn btn-primary"
                    >
                        Create Your Account
                        →
                    </a>

                </div>

            </div>

        </section>

    </main>


    <!-- =========================================================
         FOOTER
    ========================================================== -->

    <footer class="footer">

        <div class="container">

            <div class="footer-grid">


                <div class="footer-brand">

                    <a
                        href="{{ url('/') }}"
                        class="logo"
                    >

                        <div class="logo-icon">
                            M
                        </div>

                        <span>
                            Shop<strong>Mate</strong>
                        </span>

                    </a>


                    <p>
                        A modern e-commerce management platform
                        designed to help businesses manage their
                        operations from one place.
                    </p>

                </div>


                <div class="footer-column">

                    <h4>
                        Product
                    </h4>

                    <a href="#features">
                        Features
                    </a>

                    <a href="#api">
                        API
                    </a>

                    <a href="#how-it-works">
                        How It Works
                    </a>

                </div>


                <div class="footer-column">

                    <h4>
                        Company
                    </h4>

                    <a href="#about">
                        About
                    </a>

                    <a href="#">
                        Contact
                    </a>

                    <a href="#">
                        Documentation
                    </a>

                </div>


                <div class="footer-column">

                    <h4>
                        Account
                    </h4>

                    <a href="#">
                        Login
                    </a>

                    <a href="{{ route('register') }}">
                        Register
                    </a>

                </div>

            </div>


            <div class="footer-bottom">

                <span>
                    © {{ date('Y') }} ShopMate. All rights reserved.
                </span>

                <span>
                    Built for modern businesses.
                </span>

            </div>

        </div>

    </footer>


    <!-- =========================================================
         JAVASCRIPT
    ========================================================== -->

    <script>

        const menuButton =
            document.getElementById('mobileMenuBtn');

        const navbar =
            document.getElementById('navbar');


        menuButton.addEventListener('click', function () {

            navbar.classList.toggle('mobile-open');

        });


        /*
         * Close mobile navigation after clicking a link.
         */

        document
            .querySelectorAll('.nav-links a')
            .forEach(function (link) {

                link.addEventListener('click', function () {

                    navbar.classList.remove('mobile-open');

                });

            });

    </script>

</body>
</html>
```
