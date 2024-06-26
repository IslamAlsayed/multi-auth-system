<?php

namespace Modules\Auth\Http\Middleware;

use Modules\Auth\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('web')->check()) {
            return redirect(RouteServiceProvider::USER);
        } elseif (Auth::guard('admin')->check()) {
            return redirect(RouteServiceProvider::ADMIN);
        } elseif (Auth::guard('patient')->check()) {
            return redirect(RouteServiceProvider::PATIENT);
        }

        return $next($request);
    }
}
