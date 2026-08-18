<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Auth;

class CheckMaintenanceMode
{
    public function handle(Request $request, Closure $next)
    {
        $isMaintenance = SiteSetting::get('is_maintenance', '0') === '1';

        if ($isMaintenance) {
            // Allow admin routes, login routes, and authenticated users
            if (
                $request->is('admin*') ||
                $request->is('login*') ||
                $request->is('locale*') ||
                Auth::check()
            ) {
                return $next($request);
            }

            $message = SiteSetting::get('maintenance_message', 'Website KOOTA SERVICE sedang dalam pemeliharaan berkala untuk peningkatan kualitas layanan.');
            return response()->view('maintenance', compact('message'), 503);
        }

        return $next($request);
    }
}
