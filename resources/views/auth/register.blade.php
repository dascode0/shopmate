<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register - ShopMate</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7f6;
            color: #1f2937;
        }

        .register-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }

        .register-container {
            width: 100%;
            max-width: 1050px;
            background: #ffffff;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.08);
            display: grid;
            grid-template-columns: 40% 60%;
        }

        /* LEFT SIDE */

        .register-info {
            background: linear-gradient(145deg, #0f766e, #14b8a6);
            color: white;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 50px;
        }

        .logo span {
            color: #ccfbf1;
        }

        .register-info h1 {
            font-size: 36px;
            line-height: 1.2;
            margin-bottom: 18px;
        }

        .register-info p {
            font-size: 16px;
            line-height: 1.7;
            color: #e6fffb;
            margin-bottom: 35px;
        }

        .features {
            list-style: none;
        }

        .features li {
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 15px;
        }

        .check {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
        }

        /* RIGHT SIDE */

        .register-form-area {
            padding: 45px 50px;
        }

        .form-header {
            margin-bottom: 30px;
        }

        .form-header h2 {
            font-size: 28px;
            margin-bottom: 8px;
            color: #111827;
        }

        .form-header p {
            color: #6b7280;
            font-size: 14px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 600;
            color: #0f766e;
            margin-bottom: 18px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e5e7eb;
        }

        .form-section {
            margin-bottom: 28px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 7px;
        }

        input,
        select {
            width: 100%;
            height: 45px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 0 13px;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
            background: #fff;
        }

        textarea {
            width: 100%;
            min-height: 80px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            padding: 12px 13px;
            font-size: 14px;
            outline: none;
            resize: vertical;
            font-family: inherit;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #14b8a6;
            box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.1);
        }

        .error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 5px;
        }

        .register-button {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 8px;
            background: #0f766e;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .register-button:hover {
            background: #115e59;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #6b7280;
        }

        .login-link a {
            color: #0f766e;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .required {
            color: #dc2626;
        }

        /* RESPONSIVE */

        @media (max-width: 850px) {

            .register-container {
                grid-template-columns: 1fr;
                max-width: 650px;
            }

            .register-info {
                padding: 35px;
            }

            .logo {
                margin-bottom: 25px;
            }

            .register-info h1 {
                font-size: 30px;
            }

            .features {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .features li {
                margin-bottom: 5px;
            }
        }

        @media (max-width: 600px) {

            .register-wrapper {
                padding: 20px 12px;
            }

            .register-info {
                padding: 30px 25px;
            }

            .register-form-area {
                padding: 30px 25px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .features {
                grid-template-columns: 1fr;
            }

            .register-info h1 {
                font-size: 27px;
            }
        }
    </style>
</head>

<body>

<div class="register-wrapper">

    <div class="register-container">

        <!-- LEFT SIDE -->

        <div class="register-info">

            <div class="logo">
                Shop<span>Mate</span>
            </div>

            <h1>
                Start managing your business smarter.
            </h1>

            <p>
                Create your ShopMate account and get your own
                secure business workspace.
            </p>

            <ul class="features">

                <li>
                    <span class="check">✓</span>
                    Product management
                </li>

                <li>
                    <span class="check">✓</span>
                    Inventory management
                </li>

                <li>
                    <span class="check">✓</span>
                    Order management
                </li>

                <li>
                    <span class="check">✓</span>
                    REST API access
                </li>

                <li>
                    <span class="check">✓</span>
                    Separate business database
                </li>

                <li>
                    <span class="check">✓</span>
                    Business reports
                </li>

            </ul>

        </div>


        <!-- RIGHT SIDE -->

        <div class="register-form-area">

            <div class="form-header">

                <h2>Create your account</h2>

                <p>
                    Enter your account and business information.
                </p>

            </div>


            <form method="POST" action="{{ route('register') }}">

                @csrf


                <!-- USER INFORMATION -->

                <div class="form-section">

                    <div class="section-title">
                        Account Information
                    </div>

                    <div class="form-grid">

                        <div class="form-group">

                            <label for="name">
                                Full Name <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                placeholder="Enter your name"
                                required
                            >

                            @error('name')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>


                        <div class="form-group">

                            <label for="phone">
                                Phone
                            </label>

                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                value="{{ old('phone') }}"
                                placeholder="Enter phone number"
                            >

                            @error('phone')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>


                        <div class="form-group full">

                            <label for="email">
                                Email Address <span class="required">*</span>
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="you@example.com"
                                required
                            >

                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>


                        <div class="form-group">

                            <label for="password">
                                Password <span class="required">*</span>
                            </label>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Create a password"
                                required
                            >

                            @error('password')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>


                        <div class="form-group">

                            <label for="password_confirmation">
                                Confirm Password <span class="required">*</span>
                            </label>

                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                placeholder="Confirm password"
                                required
                            >

                        </div>

                    </div>

                </div>


                <!-- COMPANY INFORMATION -->

                <div class="form-section">

                    <div class="section-title">
                        Company Information
                    </div>

                    <div class="form-grid">

                        <div class="form-group full">

                            <label for="company_name">
                                Company / Shop Name
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="company_name"
                                name="company_name"
                                value="{{ old('company_name') }}"
                                placeholder="Enter company or shop name"
                                required
                            >

                            @error('company_name')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>


                        <div class="form-group">

                            <label for="company_email">
                                Company Email
                            </label>

                            <input
                                type="email"
                                id="company_email"
                                name="company_email"
                                value="{{ old('company_email') }}"
                                placeholder="company@example.com"
                            >

                        </div>


                        <div class="form-group">

                            <label for="company_phone">
                                Company Phone
                            </label>

                            <input
                                type="text"
                                id="company_phone"
                                name="company_phone"
                                value="{{ old('company_phone') }}"
                                placeholder="Company phone"
                            >

                        </div>


                        <div class="form-group full">

                            <label for="company_address">
                                Address
                            </label>

                            <textarea
                                id="company_address"
                                name="company_address"
                                placeholder="Enter company address"
                            >{{ old('company_address') }}</textarea>

                        </div>


                        <div class="form-group">

                            <label for="company_city">
                                City
                            </label>

                            <input
                                type="text"
                                id="company_city"
                                name="company_city"
                                value="{{ old('company_city') }}"
                                placeholder="City"
                            >

                        </div>


                        <div class="form-group">

                            <label for="company_state">
                                State
                            </label>

                            <input
                                type="text"
                                id="company_state"
                                name="company_state"
                                value="{{ old('company_state') }}"
                                placeholder="State"
                            >

                        </div>


                        <div class="form-group">

                            <label for="company_country">
                                Country
                            </label>

                            <input
                                type="text"
                                id="company_country"
                                name="company_country"
                                value="{{ old('company_country', 'India') }}"
                                placeholder="Country"
                            >

                        </div>


                        <div class="form-group">

                            <label for="company_pincode">
                                Pincode
                            </label>

                            <input
                                type="text"
                                id="company_pincode"
                                name="company_pincode"
                                value="{{ old('company_pincode') }}"
                                placeholder="Pincode"
                            >

                        </div>


                        <div class="form-group">

                            <label for="currency">
                                Currency
                            </label>

                            <select id="currency" name="currency">

                                <option value="INR"
                                    {{ old('currency', 'INR') == 'INR' ? 'selected' : '' }}>
                                    INR - Indian Rupee
                                </option>

                                <option value="USD"
                                    {{ old('currency') == 'USD' ? 'selected' : '' }}>
                                    USD - US Dollar
                                </option>

                                <option value="EUR"
                                    {{ old('currency') == 'EUR' ? 'selected' : '' }}>
                                    EUR - Euro
                                </option>

                            </select>

                        </div>


                        <div class="form-group">

                            <label for="timezone">
                                Timezone
                            </label>

                            <select id="timezone" name="timezone">

                                <option value="Asia/Kolkata"
                                    {{ old('timezone', 'Asia/Kolkata') == 'Asia/Kolkata' ? 'selected' : '' }}>
                                    Asia/Kolkata
                                </option>

                                <option value="America/New_York"
                                    {{ old('timezone') == 'America/New_York' ? 'selected' : '' }}>
                                    America/New_York
                                </option>

                                <option value="Europe/London"
                                    {{ old('timezone') == 'Europe/London' ? 'selected' : '' }}>
                                    Europe/London
                                </option>

                            </select>

                        </div>

                    </div>

                </div>


                <!-- SUBMIT -->

                <button type="submit" class="register-button">
                    Create Account
                </button>


                <div class="login-link">

                    Already have an account?

                    <a href="{{ route('login') }}">
                        Login
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>