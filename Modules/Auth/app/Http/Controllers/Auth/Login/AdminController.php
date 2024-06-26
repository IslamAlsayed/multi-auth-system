<?php

namespace Modules\Auth\Http\Controllers\Auth\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\Http\Requests\Auth\AdminLogin;
use Modules\Auth\Providers\RouteServiceProvider;

class AdminController extends Controller
{
    public function store(AdminLogin $request)
    {
        if ($request->authenticate()) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::ADMIN);
        }

        return redirect()->back()->withErrors(['error' => 'The email or password is Incorrect, try again!']);
    }

    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
