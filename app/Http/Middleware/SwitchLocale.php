<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SwitchLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = Session::get('locale') ?? 'en';
        Session::put('locale', $locale);
        App::setLocale($locale);

        return $next($request);
    }
}
