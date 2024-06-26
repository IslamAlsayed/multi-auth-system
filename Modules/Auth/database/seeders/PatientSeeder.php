<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Models\Patient;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Patient::truncate();

        Patient::create([
            'name' => 'patient',
            'email' => 'patient@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'role' => 'patient'
        ]);
    }
}
