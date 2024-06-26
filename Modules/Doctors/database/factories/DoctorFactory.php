<?php

namespace Modules\Doctors\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Doctors\Models\Doctor::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}
