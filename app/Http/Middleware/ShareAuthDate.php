<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ShareAuthDate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $auth = '';
        if (Auth::guard('admin')->check()) {
            $auth = Auth::guard('admin')->user();
        } elseif (Auth::guard('web')->check()) {
            $auth = Auth::guard('web')->user();
        } elseif (Auth::guard('patient')->check()) {
            $auth = Auth::guard('patient')->user();
        }

        View::share('auth', $auth);

        return $next($request);
    }
}
