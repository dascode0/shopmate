<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use App\Models\Company;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // store remmeber token and last login at in users table
            $user = Auth::user();
            $user->last_login_at = now();
            $user->save();

            $company_id = $user->company_id;
            $company = Company::find($company_id);
            $company_database_check = $company->database_status;
            if ($company_database_check == 'pending') {
                $database_name = $company->database_name;

                // create database with name $database_name
                DB::statement("CREATE DATABASE $database_name");

                //connect to the newly created database and run migrations
                config(['database.connections.tenant.database' => $database_name]);
                DB::purge('tenant');
                DB::reconnect('tenant');
                Artisan::call('migrate', [
                    '--database' => 'tenant',
                    '--path' => 'database/tenant_migrations',
                    '--force' => true,
                ]);
                //check if the migrations were successful
                $migrations = DB::connection('tenant')->table('migrations')->get();

                if ($migrations->count() > 0) {
                    // update database_status to 'active' in companies table
                    $company->database_status = 'active';
                    $company->save();
                } else {
                    // drop the database if migrations failed
                    DB::statement("DROP DATABASE $database_name");
                }
            }

            return redirect()->intended('/dashboard');
        }

        // Authentication failed...
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
