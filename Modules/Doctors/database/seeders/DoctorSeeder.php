<?php

namespace Modules\Doctors\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\Doctors\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::truncate();

        for ($i = 0; $i < 30; $i++) {
            Doctor::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make('123456789'),
                'phone' => fake()->phoneNumber(),
                'status' => fake()->randomElement([0, 1]),
                'appointments' => json_encode(fake()->randomElements(['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'], mt_rand(2, 5))),
                'section_id' => \Modules\Sections\Models\Section::all()->random()->id
            ]);
        }
    }
}
