<?php

namespace Modules\Auth\Http\Controllers\Auth\login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Auth\Http\Requests\Auth\PatientLogin;
use Modules\Auth\Providers\RouteServiceProvider;

class PatientController extends Controller
{
    public function store(PatientLogin $request)
    {
        if ($request->authenticate()) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::PATIENT);
        }

        return redirect()->back()->withErrors(['error' => 'The email or password is Incorrect, try again!']);
    }

    public function destroy(Request $request)
    {
        Auth::guard('patient')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
