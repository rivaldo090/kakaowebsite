<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Ambil user yang sedang login
        $user = Auth::user();

        // Cek apakah rolenya sesuai
        if ($user->role !== $role) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
