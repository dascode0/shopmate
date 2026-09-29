<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account - ShopMate</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f7fbf9;
            color: #17201c;
        }

        .register-page {
            min-height: 100vh;
            padding: 30px;
            position: relative;
            overflow-x: hidden;
        }

        /* Background decoration */
        .bg-shape {
            position: fixed;
            border-radius: 50%;
            background: rgba(22, 180, 116, 0.07);
            z-index: 0;
            pointer-events: none;
        }

        .shape-one {
            width: 420px;
            height: 420px;
            top: -190px;
            left: -180px;
        }

        .shape-two {
            width: 500px;
            height: 500px;
            right: -230px;
            bottom: -260px;
        }

        /* Main container */
        .register-container {
            width: 100%;
            max-width: 1150px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #e4eee9;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(18, 73, 52, 0.10);
            display: grid;
            grid-template-columns: 0.85fr 1.15fr;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        /* LEFT SIDE */
        .register-info {
            background: linear-gradient(
                145deg,
                #073d2d 0%,
                #07583f 55%,
                #08734e 100%
            );

            color: #ffffff;
            padding: 50px;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .register-info::before {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.08);
            right: -180px;
            top: -90px;
        }

        .register-info::after {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.07);
            left: -150px;
            bottom: -120px;
        }

        /* Brand */
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
            z-index: 2;
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
            font-size: 19px;
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

        /* Info content */
        .info-content {
            position: relative;
            z-index: 2;
            max-width: 410px;
            margin-top: 50px;
        }

        .small-title {
            color: #83e2b8;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 14px;
        }

        .info-content h1 {
            font-size: 40px;
            line-height: 1.12;
            letter-spacing: -1.4px;
            margin-bottom: 18px;
        }

        .info-content h1 span {
            color: #5de0a3;
        }

        .info-content p {
            color: #c9e7da;
            font-size: 14px;
            line-height: 1.7;
        }

        /* Benefits */
        .benefits {
            position: relative;
            z-index: 2;
            margin-top: 40px;
        }

        .benefit {
            display: flex;
            gap: 13px;
            margin-bottom: 20px;
        }

        .benefit-icon {
            flex-shrink: 0;
            width: 34px;
            height: 34px;
            border-radius: 9px;
            background: rgba(255,255,255,0.10);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #63e2aa;
            font-size: 14px;
        }

        .benefit-text strong {
            display: block;
            font-size: 13px;
            margin-bottom: 3px;
        }

        .benefit-text span {
            color: #acd9c7;
            font-size: 11px;
            line-height: 1.4;
        }

        /* FORM SIDE */
        .register-form-area {
            padding: 50px 55px;
            background: #ffffff;
        }

        .register-form {
            width: 100%;
        }

        .form-heading {
            margin-bottom: 30px;
        }

        .form-heading h2 {
            font-size: 30px;
            letter-spacing: -0.8px;
            color: #16211c;
            margin-bottom: 7px;
        }

        .form-heading p {
            color: #7c8b84;
            font-size: 13px;
        }

        /* Section */
        .form-section {
            margin-bottom: 27px;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 17px;
        }

        .section-number {
            width: 25px;
            height: 25px;
            border-radius: 7px;
            background: #e8f8f1;
            color: #078f5b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 800;
        }

        .section-title h3 {
            font-size: 14px;
            color: #27362f;
        }

        .section-title span {
            font-size: 11px;
            color: #99a59f;
            margin-left: 2px;
        }

        /* Grid */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 17px 15px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        /* Form controls */
        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #35443d;
            margin-bottom: 7px;
        }

        .required {
            color: #e05252;
        }

        .input-wrapper {
            position: relative;
        }

        .form-control,
        .form-select {
            width: 100%;
            height: 45px;
            border: 1px solid #dce7e2;
            border-radius: 8px;
            background: #ffffff;
            padding: 0 13px;
            color: #202b26;
            font-size: 13px;
            outline: none;
            transition: all 0.2s ease;
        }

        textarea.form-control {
            height: auto;
            min-height: 78px;
            padding: 11px 13px;
            resize: vertical;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #12a86b;
            box-shadow: 0 0 0 3px rgba(18, 168, 107, 0.09);
        }

        .form-control::placeholder {
            color: #a5b0aa;
        }

        .form-select {
            cursor: pointer;
        }

        /* Password */
        .password-input {
            padding-right: 48px;
        }

        .password-toggle {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #87958e;
            font-size: 12px;
            cursor: pointer;
        }

        /* Error */
        .error-message {
            color: #dc3545;
            font-size: 11px;
            margin-top: 5px;
        }

        .form-control.is-invalid,
        .form-select.is-invalid {
            border-color: #dc3545;
        }

        .general-error {
            background: #fff3f3;
            border: 1px solid #ffd4d4;
            color: #c62828;
            border-radius: 8px;
            padding: 11px 13px;
            margin-bottom: 20px;
            font-size: 12px;
        }

        /* Terms */
        .terms {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            margin: 4px 0 20px;
        }

        .terms input {
            width: 15px;
            height: 15px;
            margin-top: 1px;
            accent-color: #07965f;
            flex-shrink: 0;
        }

        .terms label {
            font-size: 11px;
            line-height: 1.5;
            color: #78857f;
            cursor: pointer;
        }

        .terms a {
            color: #078f5b;
            text-decoration: none;
            font-weight: 600;
        }

        /* Button */
        .register-button {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 9px;
            background: linear-gradient(135deg, #07965f, #087d51);
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 7px 18px rgba(7, 150, 95, 0.19);
            transition: all 0.2s ease;
        }

        .register-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 22px rgba(7, 150, 95, 0.24);
        }

        .login-text {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #7b8982;
        }

        .login-text a {
            color: #078f5b;
            text-decoration: none;
            font-weight: 700;
        }

        /* TABLET */
        @media (max-width: 950px) {

            .register-container {
                grid-template-columns: 1fr;
                max-width: 720px;
            }

            .register-info {
                padding: 38px 40px;
            }

            .info-content {
                max-width: 600px;
                margin-top: 35px;
            }

            .info-content h1 {
                font-size: 34px;
            }

            .benefits {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 12px;
                margin-top: 30px;
            }

            .benefit {
                margin-bottom: 0;
            }

            .register-form-area {
                padding: 42px 40px;
            }
        }

        /* MOBILE */
        @media (max-width: 600px) {

            .register-page {
                padding: 12px;
            }

            .register-container {
                border-radius: 18px;
            }

            .register-info {
                padding: 27px 23px;
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
                margin-top: 28px;
            }

            .small-title {
                font-size: 10px;
                margin-bottom: 9px;
            }

            .info-content h1 {
                font-size: 28px;
                letter-spacing: -0.8px;
            }

            .info-content p {
                font-size: 12px;
                line-height: 1.6;
            }

            .benefits {
                display: none;
            }

            .register-form-area {
                padding: 30px 22px 32px;
            }

            .form-heading {
                margin-bottom: 25px;
            }

            .form-heading h2 {
                font-size: 25px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .form-group.full {
                grid-column: auto;
            }

            .section-title {
                margin-bottom: 14px;
            }
        }

        /* SMALL MOBILE */
        @media (max-width: 380px) {

            .register-page {
                padding: 8px;
            }

            .register-info {
                padding: 23px 19px;
            }

            .register-form-area {
                padding: 27px 18px 30px;
            }

            .info-content h1 {
                font-size: 25px;
            }

            .form-heading h2 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

<div class="register-page">

    <div class="bg-shape shape-one"></div>
    <div class="bg-shape shape-two"></div>

    <div class="register-container">

        {{-- LEFT BRANDING --}}
        <div class="register-info">

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
                    Start Your Business Journey
                </div>

                <h1>
                    Create Your
                    <span>ShopMate</span>
                    Account
                </h1>

                <p>
                    Manage your products, orders, customers,
                    inventory and business operations from one
                    powerful platform.
                </p>

            </div>


            <div class="benefits">

                <div class="benefit">

                    <div class="benefit-icon">
                        ✓
                    </div>

                    <div class="benefit-text">
                        <strong>Easy Setup</strong>
                        <span>
                            Get your business started quickly.
                        </span>
                    </div>

                </div>


                <div class="benefit">

                    <div class="benefit-icon">
                        ◈
                    </div>

                    <div class="benefit-text">
                        <strong>Secure Data</strong>
                        <span>
                            Your business data stays isolated.
                        </span>
                    </div>

                </div>


                <div class="benefit">

                    <div class="benefit-icon">
                        ⌁
                    </div>

                    <div class="benefit-text">
                        <strong>Powerful API</strong>
                        <span>
                            Connect your own website or app.
                        </span>
                    </div>

                </div>

            </div>

        </div>


        {{-- REGISTER FORM --}}
        <div class="register-form-area">

            <div class="register-form">

                <div class="form-heading">

                    <h2>Create Your Account</h2>

                    <p>
                        Join ShopMate and start managing your business.
                    </p>

                </div>


                @if ($errors->any())
                    <div class="general-error">
                        Please check the highlighted fields and try again.
                    </div>
                @endif


                <form method="POST" action="{{ route('register') }}">

                    @csrf


                    {{-- ACCOUNT INFORMATION --}}
                    <div class="form-section">

                        <div class="section-title">

                            <div class="section-number">
                                01
                            </div>

                            <h3>Account Information</h3>

                            <span>
                                Your login details
                            </span>

                        </div>


                        <div class="form-grid">

                            {{-- NAME --}}
                            <div class="form-group">

                                <label for="name">
                                    Full Name
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter your full name"
                                    required
                                >

                                @error('name')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- PHONE --}}
                            <div class="form-group">

                                <label for="phone">
                                    Phone Number
                                </label>

                                <input
                                    type="text"
                                    id="phone"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="Enter phone number"
                                >

                                @error('phone')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- EMAIL --}}
                            <div class="form-group full">

                                <label for="email">
                                    Email Address
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter your email address"
                                    required
                                >

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
                                    <span class="required">*</span>
                                </label>

                                <div class="input-wrapper">

                                    <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        class="form-control password-input @error('password') is-invalid @enderror"
                                        placeholder="Create a password"
                                        required
                                    >

                                    <button
                                        type="button"
                                        class="password-toggle"
                                        onclick="togglePassword('password', this)"
                                    >
                                        Show
                                    </button>

                                </div>

                                @error('password')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- CONFIRM PASSWORD --}}
                            <div class="form-group">

                                <label for="password_confirmation">
                                    Confirm Password
                                    <span class="required">*</span>
                                </label>

                                <div class="input-wrapper">

                                    <input
                                        type="password"
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        class="form-control password-input"
                                        placeholder="Confirm your password"
                                        required
                                    >

                                    <button
                                        type="button"
                                        class="password-toggle"
                                        onclick="togglePassword('password_confirmation', this)"
                                    >
                                        Show
                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- COMPANY INFORMATION --}}
                    <div class="form-section">

                        <div class="section-title">

                            <div class="section-number">
                                02
                            </div>

                            <h3>Company Information</h3>

                            <span>
                                Your business details
                            </span>

                        </div>


                        <div class="form-grid">

                            {{-- COMPANY NAME --}}
                            <div class="form-group full">

                                <label for="company_name">
                                    Company Name
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="company_name"
                                    name="company_name"
                                    value="{{ old('company_name') }}"
                                    class="form-control @error('company_name') is-invalid @enderror"
                                    placeholder="Enter your company name"
                                    required
                                >

                                @error('company_name')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- COMPANY EMAIL --}}
                            <div class="form-group">

                                <label for="company_email">
                                    Company Email
                                </label>

                                <input
                                    type="email"
                                    id="company_email"
                                    name="company_email"
                                    value="{{ old('company_email') }}"
                                    class="form-control @error('company_email') is-invalid @enderror"
                                    placeholder="Company email"
                                >

                                @error('company_email')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- COMPANY PHONE --}}
                            <div class="form-group">

                                <label for="company_phone">
                                    Company Phone
                                </label>

                                <input
                                    type="text"
                                    id="company_phone"
                                    name="company_phone"
                                    value="{{ old('company_phone') }}"
                                    class="form-control @error('company_phone') is-invalid @enderror"
                                    placeholder="Company phone"
                                >

                                @error('company_phone')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- ADDRESS --}}
                            <div class="form-group full">

                                <label for="company_address">
                                    Company Address
                                </label>

                                <textarea
                                    id="company_address"
                                    name="company_address"
                                    class="form-control @error('company_address') is-invalid @enderror"
                                    placeholder="Enter company address"
                                >{{ old('company_address') }}</textarea>

                                @error('company_address')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- CITY --}}
                            <div class="form-group">

                                <label for="company_city">
                                    City
                                </label>

                                <input
                                    type="text"
                                    id="company_city"
                                    name="company_city"
                                    value="{{ old('company_city') }}"
                                    class="form-control @error('company_city') is-invalid @enderror"
                                    placeholder="City"
                                >

                                @error('company_city')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- STATE --}}
                            <div class="form-group">

                                <label for="company_state">
                                    State
                                </label>

                                <input
                                    type="text"
                                    id="company_state"
                                    name="company_state"
                                    value="{{ old('company_state') }}"
                                    class="form-control @error('company_state') is-invalid @enderror"
                                    placeholder="State"
                                >

                                @error('company_state')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- COUNTRY --}}
                            <div class="form-group">

                                <label for="company_country">
                                    Country
                                </label>

                                <input
                                    type="text"
                                    id="company_country"
                                    name="company_country"
                                    value="{{ old('company_country') }}"
                                    class="form-control @error('company_country') is-invalid @enderror"
                                    placeholder="Country"
                                >

                                @error('company_country')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- PINCODE --}}
                            <div class="form-group">

                                <label for="company_pincode">
                                    PIN Code
                                </label>

                                <input
                                    type="text"
                                    id="company_pincode"
                                    name="company_pincode"
                                    value="{{ old('company_pincode') }}"
                                    class="form-control @error('company_pincode') is-invalid @enderror"
                                    placeholder="PIN code"
                                    maxlength="6"
                                >

                                @error('company_pincode')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- CURRENCY --}}
                            <div class="form-group">

                                <label for="company_currency">
                                    Currency
                                </label>

                                <select
                                    id="company_currency"
                                    name="company_currency"
                                    class="form-select @error('company_currency') is-invalid @enderror"
                                >
                                    <option value="">Select currency</option>

                                    <option value="INR"
                                        {{ old('company_currency') == 'INR' ? 'selected' : '' }}>
                                        INR - Indian Rupee
                                    </option>

                                    <option value="USD"
                                        {{ old('company_currency') == 'USD' ? 'selected' : '' }}>
                                        USD - US Dollar
                                    </option>

                                    <option value="EUR"
                                        {{ old('company_currency') == 'EUR' ? 'selected' : '' }}>
                                        EUR - Euro
                                    </option>

                                    <option value="GBP"
                                        {{ old('company_currency') == 'GBP' ? 'selected' : '' }}>
                                        GBP - British Pound
                                    </option>

                                </select>

                                @error('company_currency')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            {{-- TIMEZONE --}}
                            <div class="form-group">

                                <label for="company_timezone">
                                    Timezone
                                </label>

                                <select
                                    id="company_timezone"
                                    name="company_timezone"
                                    class="form-select @error('company_timezone') is-invalid @enderror"
                                >
                                    <option value="">Select timezone</option>

                                    <option value="Asia/Kolkata"
                                        {{ old('company_timezone') == 'Asia/Kolkata' ? 'selected' : '' }}>
                                        Asia/Kolkata
                                    </option>

                                    <option value="UTC"
                                        {{ old('company_timezone') == 'UTC' ? 'selected' : '' }}>
                                        UTC
                                    </option>

                                    <option value="America/New_York"
                                        {{ old('company_timezone') == 'America/New_York' ? 'selected' : '' }}>
                                        America/New_York
                                    </option>

                                    <option value="Europe/London"
                                        {{ old('company_timezone') == 'Europe/London' ? 'selected' : '' }}>
                                        Europe/London
                                    </option>

                                </select>

                                @error('company_timezone')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- TERMS --}}
                    <div class="terms">

                        <input
                            type="checkbox"
                            id="terms"
                            name="terms"
                            value="1"
                            required
                        >

                        <label for="terms">
                            I agree to the
                            <a href="#">Terms & Conditions</a>
                            and
                            <a href="#">Privacy Policy</a>.
                        </label>

                    </div>


                    {{-- REGISTER BUTTON --}}
                    <button
                        type="submit"
                        class="register-button"
                    >
                        Create Account
                    </button>


                    {{-- LOGIN LINK --}}
                    <div class="login-text">

                        Already have an account?

                        <a href="{{ route('login') }}">
                            Login
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


<script>

    function togglePassword(fieldId, button) {

        const field = document.getElementById(fieldId);

        if (field.type === 'password') {

            field.type = 'text';
            button.textContent = 'Hide';

        } else {

            field.type = 'password';
            button.textContent = 'Show';

        }
    }

</script>

</body>
</html>