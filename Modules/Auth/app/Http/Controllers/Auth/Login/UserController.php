<?php

namespace Modules\Auth\Http\Controllers\Auth\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\Http\Requests\Auth\UserLogin;
use Modules\Auth\Providers\RouteServiceProvider;

class UserController extends Controller
{
    public function create()
    {
        return view('auth::auth.login');
    }

    public function store(UserLogin $request)
    {
        if ($request->authenticate()) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::USER);
        }

        return redirect()->back()->withErrors(['error' => 'The email or password is Incorrect, try again!']);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
