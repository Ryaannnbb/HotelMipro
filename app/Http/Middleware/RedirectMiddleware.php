<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role === 'admin') {
                if ($request->route()->getName() !== 'logout') {
                    return redirect()->route('dashboard');
                }
            } else if (Auth::user()->role === 'user') {
                if ($request->route()->getName() !== 'logout') {
                    return redirect()->route('homeuser');
                }
            }
        }

        return $next($request);
    }
}
