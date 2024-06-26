<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------
| Web Routes
|--------------------------------
*/

Route::get("auth", fn () => 'auth module');

require __DIR__ . '/auth.php';
