<?php

namespace App\Http\Controllers\Dashboard\Patient;

use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    public function index()
    {
        return view('dashboard.patient.index');
    }
}
