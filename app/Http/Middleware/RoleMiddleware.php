<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Jika belum login
        if (!Auth::check()) {
            abort(403);
        }

        // Ambil role user
        $userRole = Auth::user()->role;

        // Cek role
        if (!in_array($userRole, $roles)) {
            abort(403);
        }

        return $next($request);
    }
}
