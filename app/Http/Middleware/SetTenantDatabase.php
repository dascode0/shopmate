<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SetTenantDatabase
{
    public function handle(Request $request, Closure $next): Response
    {
        $company = $request->user()?->company;

        abort_unless($company && $company->database_status === 'active', 403);

        config([
            'database.connections.tenant.database' => $company->database_name,
        ]);

        DB::purge('tenant');
        DB::reconnect('tenant');
        // dd([
        //     'user_id' => Auth::id(),
        //     'database_name' => $company->database_name ?? null,
        //     'config_database' => config('database.connections.tenant.database'),
        // ]);
        return $next($request);
    }
}
