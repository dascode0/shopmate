<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function registerSubmit(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => [
                'nullable',
                'digits:10',
                'regex:/^[6-9][0-9]{9}$/',
            ],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',

            'company_name' => 'required|string|max:255',
            'comapany_email' => 'nullable|string|email|max:255|unique:companies,email',
            'company_phone' => [
                'nullable',
                'digits:10',
                'regex:/^[6-9][0-9]{9}$/',
            ],
            'company_address' => 'nullable|string',
            'company_city' => 'nullable|string|max:255',
            'company_state' => 'nullable|string|max:255',
            'company_country' => 'nullable|string|max:255',
            'company_pincode' => [
                'nullable',
                'digits:6',
                'regex:/^[1-9][0-9]{5}$/',
            ],
            'company_currency' => 'nullable|string|max:10',
            'company_timezone' => 'nullable|string|max:100',
        ]);

        // Create a new company
        $company = Company::create([
            'name' => $request->company_name,
            'email' => $request->company_email,
            'phone' => $request->company_phone,
            'address' => $request->company_address,
            'city' => $request->company_city,
            'state' => $request->company_state,
            'country' => $request->company_country,
            'pincode' => $request->company_pincode,
            'currency' => $request->company_currency ?? 'INR',
            'timezone' => $request->company_timezone ?? 'Asia/Kolkata',
            'database_name' => 'company_' . time(),
            'database_status' => 'pending',
            'status' => 'active',

        ]);
        $company_id = $company->id;

        // Create a new user associated with the company
        $shopKey = 'sm_' . Str::random(7);
        $user = User::create([
            'shop_key' => $shopKey,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'company_id' => $company_id,
            'status' => 'active',
        ]);

        //redirect to a success page or login page after successful registration
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
}
