<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | ShopMate</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
            color: #1f2937;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1050px;
            min-height: 620px;
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(0, 0, 0, 0.08);
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        /* Left Section */

        .brand-section {
            background: linear-gradient(135deg, #111827, #1f2937);
            color: #ffffff;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 45px;
        }

        .logo span {
            color: #60a5fa;
        }

        .brand-section h1 {
            font-size: 42px;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .brand-section p {
            color: #cbd5e1;
            font-size: 16px;
            line-height: 1.7;
            max-width: 430px;
        }

        .features {
            margin-top: 40px;
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #e5e7eb;
            font-size: 15px;
        }

        .feature-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(96, 165, 250, 0.15);
            color: #60a5fa;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* Right Section */

        .form-section {
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            margin-bottom: 35px;
        }

        .form-header h2 {
            font-size: 30px;
            margin-bottom: 10px;
            color: #111827;
        }

        .form-header p {
            color: #6b7280;
            font-size: 15px;
        }

        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-error {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #374151;
        }

        .form-control {
            width: 100%;
            height: 48px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 0 14px;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .password-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8px;
        }

        .password-row label {
            margin-bottom: 0;
        }

        .forgot-password {
            color: #2563eb;
            font-size: 13px;
            text-decoration: none;
            font-weight: 500;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin: 5px 0 25px;
        }

        .remember-row input {
            width: 16px;
            height: 16px;
            cursor: pointer;
        }

        .remember-row label {
            font-size: 14px;
            color: #4b5563;
            cursor: pointer;
        }

        .login-btn {
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 8px;
            background: #2563eb;
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .login-btn:hover {
            background: #1d4ed8;
        }

        .register-text {
            text-align: center;
            margin-top: 25px;
            color: #6b7280;
            font-size: 14px;
        }

        .register-text a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
        }

        .register-text a:hover {
            text-decoration: underline;
        }

        /* Responsive */

        @media (max-width: 800px) {
            body {
                padding: 15px;
            }

            .login-wrapper {
                grid-template-columns: 1fr;
                max-width: 550px;
            }

            .brand-section {
                padding: 40px;
            }

            .brand-section h1 {
                font-size: 32px;
            }

            .features {
                margin-top: 25px;
            }

            .form-section {
                padding: 40px;
            }
        }

        @media (max-width: 480px) {

            .brand-section,
            .form-section {
                padding: 30px 22px;
            }

            .brand-section h1 {
                font-size: 28px;
            }

            .form-header h2 {
                font-size: 26px;
            }
        }
    </style>
</head>

<body>

    <div class="login-wrapper">
        <!-- Left Side -->
        <div class="brand-section">

            <div class="logo">
                Shop<span>Mate</span>
            </div>

            <h1>
                Manage your business smarter.
            </h1>

            <p>
                Access your ShopMate dashboard and manage products,
                orders, inventory, customers and more from one place.
            </p>

            <div class="features">

                <div class="feature">
                    <div class="feature-icon">✓</div>
                    <span>Manage products and inventory</span>
                </div>

                <div class="feature">
                    <div class="feature-icon">✓</div>
                    <span>Track orders and customers</span>
                </div>

                <div class="feature">
                    <div class="feature-icon">✓</div>
                    <span>Powerful business management</span>
                </div>

            </div>

        </div>


        <!-- Right Side -->
        <div class="form-section">

            <div class="form-header">

                <h2>Welcome back</h2>

                <p>
                    Login to your ShopMate account
                </p>

            </div>


            {{-- Validation Errors --}}
            @if ($errors->any())
            <div class="alert alert-error">

                @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
                @endforeach

            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success" style="color: green; background-color: #d1fae5; border: 1px solid #10b981; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                {{ session('success') }}    
            </div>
            @endif


            {{-- Login Form --}}
            <form method="POST" action="{{ route('login') }}">

                @csrf


                <!-- Email -->
                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="Enter your email"
                        required
                        autofocus>

                </div>


                <!-- Password -->
                <div class="form-group">

                    <div class="password-row">

                        <label for="password">
                            Password
                        </label>

                        <a
                            href="#"
                            class="forgot-password">
                            Forgot password?
                        </a>

                    </div>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        placeholder="Enter your password"
                        required>

                </div>


                <!-- Remember Me -->
                <div class="remember-row">

                    <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                        value="1">

                    <label for="remember">
                        Remember me
                    </label>

                </div>


                <!-- Login Button -->
                <button
                    type="submit"
                    class="login-btn">
                    Login
                </button>

            </form>


            <!-- Register -->
            <div class="register-text">

                Don't have an account?

                <a href="{{ route('register') }}">
                    Create an account
                </a>

            </div>

        </div>

    </div>

</body>

</html>