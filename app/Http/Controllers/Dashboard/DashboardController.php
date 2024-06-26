<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\Providers\RouteServiceProvider;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->intended(RouteServiceProvider::ADMIN);
        } elseif (Auth::guard('web')->check()) {
            return redirect()->intended(RouteServiceProvider::USER);
        } elseif (Auth::guard('patient')->check()) {
            return redirect()->intended(RouteServiceProvider::PATIENT);
        }

        return redirect('/');
    }
}
