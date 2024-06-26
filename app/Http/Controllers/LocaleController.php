<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function switchLocale($locale)
    {
        if (in_array($locale, ['ar', 'en'])) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        }

        return redirect()->back();
    }
}