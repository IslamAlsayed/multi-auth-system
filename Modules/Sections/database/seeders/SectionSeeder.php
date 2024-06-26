<?php

namespace Modules\Sections\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Sections\Models\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::create(['name' => 'surgery', 'description' => fake()->paragraph(rand(1, 5))]);
        Section::create(['name' => 'neurology', 'description' => fake()->paragraph(rand(1, 5))]);
        Section::create(['name' => 'abdomen', 'description' => fake()->paragraph(rand(1, 5))]);
        Section::create(['name' => 'childbirth', 'description' => fake()->paragraph(rand(1, 5))]);
        Section::create(['name' => 'children', 'description' => fake()->paragraph(rand(1, 5))]);
    }
}
