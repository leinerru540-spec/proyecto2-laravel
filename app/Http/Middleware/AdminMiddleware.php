<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {

            return redirect('/login');
        }

        if (Auth::user()->rol_id != 2) {

            return redirect('/solicitudes');
        }

        return $next($request);
    }
}