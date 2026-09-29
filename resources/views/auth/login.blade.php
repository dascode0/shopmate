<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - ShopMate</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            min-height: 100vh;
            background: #f7fbf9;
            color: #17201c;
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            position: relative;
            overflow: hidden;
        }

        /* Background decoration */
        .bg-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(22, 180, 116, 0.08);
            z-index: 0;
        }

        .shape-one {
            width: 420px;
            height: 420px;
            top: -180px;
            left: -160px;
        }

        .shape-two {
            width: 500px;
            height: 500px;
            right: -220px;
            bottom: -250px;
        }

        .login-container {
            width: 100%;
            max-width: 1100px;
            min-height: 650px;
            background: #ffffff;
            border: 1px solid #e5eee9;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(18, 73, 52, 0.10);
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        /* LEFT SIDE */
        .login-info {
            background: linear-gradient(145deg,
                    #073d2d 0%,
                    #07583f 55%,
                    #08734e 100%);
            color: #ffffff;
            padding: 55px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }

        .login-info::before {
            content: "";
            position: absolute;
            width: 330px;
            height: 330px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.08);
            right: -140px;
            top: -80px;
        }

        .login-info::after {
            content: "";
            position: absolute;
            width: 260px;
            height: 260px;
            border-radius: 50%;
            border: 1px solid rgba(255, 255, 255, 0.07);
            left: -130px;
            bottom: -100px;
        }

        .brand {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #ffffff;
            color: #087b52;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 800;
        }

        .brand-name {
            font-size: 22px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .brand-name span {
            color: #55d99f;
        }

        .info-content {
            position: relative;
            z-index: 2;
            max-width: 430px;
        }

        .info-content .small-title {
            font-size: 13px;
            font-weight: 600;
            color: #83e2b8;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 15px;
        }

        .info-content h1 {
            font-size: 43px;
            line-height: 1.12;
            letter-spacing: -1.5px;
            margin-bottom: 20px;
        }

        .info-content h1 span {
            color: #5de0a3;
        }

        .info-content p {
            color: #c9e7da;
            font-size: 15px;
            line-height: 1.7;
            max-width: 390px;
        }

        .features {
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }

        .feature {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            padding: 15px 12px;
        }

        .feature-icon {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 9px;
            color: #6be5ad;
            font-size: 14px;
        }

        .feature strong {
            display: block;
            font-size: 12px;
            margin-bottom: 4px;
        }

        .feature small {
            color: #acd9c7;
            font-size: 10px;
            line-height: 1.4;
        }

        /* RIGHT SIDE */
        .login-form-area {
            padding: 55px 65px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
        }

        .login-form {
            width: 100%;
            max-width: 410px;
        }

        .form-heading {
            margin-bottom: 32px;
        }

        .form-heading h2 {
            font-size: 30px;
            letter-spacing: -0.8px;
            margin-bottom: 8px;
            color: #16211c;
        }

        .form-heading p {
            color: #7c8b84;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #35443d;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a49c;
            font-size: 14px;
            pointer-events: none;
        }

        .form-control {
            width: 100%;
            height: 48px;
            border: 1px solid #dce7e2;
            border-radius: 9px;
            padding: 0 15px 0 42px;
            font-size: 14px;
            color: #202b26;
            background: #ffffff;
            outline: none;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: #12a86b;
            box-shadow: 0 0 0 3px rgba(18, 168, 107, 0.10);
        }

        .form-control::placeholder {
            color: #a6b1ac;
        }

        .password-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: 0;
            background: transparent;
            color: #8d9c95;
            cursor: pointer;
            font-size: 13px;
        }

        .password-input {
            padding-right: 45px;
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin: 5px 0 24px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #68766f;
            cursor: pointer;
        }

        .remember input {
            width: 15px;
            height: 15px;
            accent-color: #07965f;
            cursor: pointer;
        }

        .forgot-link {
            font-size: 13px;
            color: #07965f;
            text-decoration: none;
            font-weight: 600;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .login-button {
            width: 100%;
            height: 49px;
            border: none;
            border-radius: 9px;
            background: linear-gradient(135deg, #07965f, #087d51);
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 7px 18px rgba(7, 150, 95, 0.20);
        }

        .login-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 22px rgba(7, 150, 95, 0.25);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .register-text {
            text-align: center;
            margin-top: 25px;
            color: #7b8982;
            font-size: 13px;
        }

        .register-text a {
            color: #078f5b;
            font-weight: 700;
            text-decoration: none;
        }

        .register-text a:hover {
            text-decoration: underline;
        }

        /* Validation */
        .error-message {
            color: #dc3545;
            font-size: 12px;
            margin-top: 6px;
        }

        .form-control.is-invalid {
            border-color: #dc3545;
        }

        .general-error {
            background: #fff3f3;
            border: 1px solid #ffd4d4;
            color: #c62828;
            border-radius: 8px;
            padding: 11px 13px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        /* TABLET */
        @media (max-width: 900px) {
            .login-container {
                max-width: 720px;
                grid-template-columns: 1fr;
                min-height: auto;
            }

            .login-info {
                padding: 38px 40px;
                min-height: 310px;
            }

            .info-content {
                max-width: 600px;
            }

            .info-content h1 {
                font-size: 34px;
            }

            .features {
                max-width: 600px;
            }

            .login-form-area {
                padding: 45px 40px;
            }
        }

        /* MOBILE */
        @media (max-width: 600px) {
            .login-page {
                padding: 15px;
                align-items: flex-start;
            }

            .login-container {
                border-radius: 18px;
                margin: 10px 0;
            }

            .login-info {
                padding: 28px 24px;
                min-height: 285px;
            }

            .brand-icon {
                width: 34px;
                height: 34px;
                font-size: 17px;
            }

            .brand-name {
                font-size: 19px;
            }

            .info-content {
                margin-top: 30px;
            }

            .info-content .small-title {
                font-size: 11px;
                margin-bottom: 9px;
            }

            .info-content h1 {
                font-size: 29px;
                line-height: 1.15;
                letter-spacing: -0.8px;
                margin-bottom: 12px;
            }

            .info-content p {
                font-size: 13px;
                line-height: 1.55;
            }

            .features {
                display: none;
            }

            .login-form-area {
                padding: 32px 24px 35px;
            }

            .form-heading {
                margin-bottom: 25px;
            }

            .form-heading h2 {
                font-size: 25px;
            }

            .form-heading p {
                font-size: 13px;
            }

            .form-group {
                margin-bottom: 17px;
            }

            .form-options {
                align-items: flex-start;
            }

            .remember {
                font-size: 12px;
            }

            .forgot-link {
                font-size: 12px;
            }
        }

        /* SMALL MOBILE */
        @media (max-width: 380px) {
            .login-page {
                padding: 10px;
            }

            .login-info {
                padding: 24px 20px;
            }

            .login-form-area {
                padding: 28px 20px 30px;
            }

            .info-content h1 {
                font-size: 26px;
            }

            .form-heading h2 {
                font-size: 23px;
            }

            .form-options {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>

<body>

    <div class="login-page">

        <div class="bg-shape shape-one"></div>
        <div class="bg-shape shape-two"></div>

        <div class="login-container">

            {{-- LEFT BRANDING AREA --}}
            <div class="login-info">

                <div class="brand">
                    <div class="brand-icon">
                        🛍
                    </div>

                    <div class="brand-name">
                        Shop<span>Mate</span>
                    </div>
                </div>

                <div class="info-content">

                    <div class="small-title">
                        Multi-Tenant Business Platform
                    </div>

                    <h1>
                        Power Your Business
                        <span>with ShopMate</span>
                    </h1>

                    <p>
                        A complete multi-tenant platform to manage
                        products, orders, inventory, customers and more.
                        Built for modern businesses.
                    </p>

                </div>

                <div class="features">

                    <div class="feature">
                        <div class="feature-icon">◈</div>
                        <strong>Multi-Tenant</strong>
                        <small>Separate business data</small>
                    </div>

                    <div class="feature">
                        <div class="feature-icon">✓</div>
                        <strong>Secure</strong>
                        <small>Reliable platform</small>
                    </div>

                    <div class="feature">
                        <div class="feature-icon">⌁</div>
                        <strong>Powerful API</strong>
                        <small>Connect your apps</small>
                    </div>

                </div>

            </div>


            {{-- LOGIN FORM --}}
            <div class="login-form-area">

                <div class="login-form">

                    <div class="form-heading">
                        <h2>Welcome Back!</h2>

                        <p>
                            Login to your account to continue
                        </p>
                    </div>


                    {{-- General validation error --}}
                    @if ($errors->any())
                    <div class="general-error">
                        Please check the highlighted fields and try again.
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success" style="color: green; background-color: #d1fae5; border: 1px solid #10b981; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                        {{ session('success') }}
                    </div>
                    @endif


                    <form method="POST" action="{{ route('login') }}">

                        @csrf


                        {{-- EMAIL --}}
                        <div class="form-group">

                            <label for="email">
                                Email Address
                            </label>

                            <div class="input-wrapper">

                                <span class="input-icon">✉</span>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter your email"
                                    autocomplete="email"
                                    required>

                            </div>

                            @error('email')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>


                        {{-- PASSWORD --}}
                        <div class="form-group">

                            <label for="password">
                                Password
                            </label>

                            <div class="input-wrapper">

                                <span class="input-icon">🔒</span>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="form-control password-input @error('password') is-invalid @enderror"
                                    placeholder="Enter your password"
                                    autocomplete="current-password"
                                    required>

                                <button
                                    type="button"
                                    class="password-toggle"
                                    onclick="togglePassword()">
                                    Show
                                </button>

                            </div>

                            @error('password')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>


                        {{-- REMEMBER + FORGOT --}}
                        <div class="form-options">

                            <label class="remember">

                                <input
                                    type="checkbox"
                                    name="remember"
                                    value="1"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <span>Remember me</span>

                            </label>

                            <a href="#" class="forgot-link">
                                Forgot Password?
                            </a>

                        </div>


                        {{-- LOGIN BUTTON --}}
                        <button
                            type="submit"
                            class="login-button">
                            Login
                        </button>


                        {{-- REGISTER --}}
                        <div class="register-text">

                            Don't have an account?

                            <a href="{{ route('register') }}">
                                Create Account
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>


    <script>
        function togglePassword() {

            const password = document.getElementById('password');
            const button = document.querySelector('.password-toggle');

            if (password.type === 'password') {
                password.type = 'text';
                button.textContent = 'Hide';
            } else {
                password.type = 'password';
                button.textContent = 'Show';
            }
        }
    </script>

</body>

</html>