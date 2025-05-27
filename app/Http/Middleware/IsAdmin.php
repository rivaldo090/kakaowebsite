<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Session::get('role') !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
