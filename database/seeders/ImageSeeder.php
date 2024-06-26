<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use Modules\Doctors\Models\Doctor;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // image::truncate();

        // for ($i = 1; $i <= count(Doctor::all()); $i++) {
        //     image::create([
        //         'filename' => fake()->randomElement(['doctor1.png', 'doctor2.png', 'doctor3.png', 'doctor4.png', 'doctor5.png']),
        //         'imageable_id' => Doctor::find($i)->id,
        //         'imageable_type' => 'Modules\Doctors\Models\Doctor',
        //     ]);
        // }
    }
}
