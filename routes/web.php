<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocaleController;

/*
|--------------------------------
| Web Routes
|--------------------------------
*/

Route::get('/', function () {
    $guards = array_keys(config('auth.guards'));
    return view('welcome', compact('guards'));
});

Route::get('lang/{locale}', [LocaleController::class, 'switchLocale']);
