<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.user.index');
    }
}
