<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->level == 'admin') {
            return $next($request);
        }

        if (Auth::check() && in_array(Auth::user()->level, ['bendahara', 'pemilik'])) {
            return $next($request);
        }
        return redirect()->route('login-karyawan');
    }
}
