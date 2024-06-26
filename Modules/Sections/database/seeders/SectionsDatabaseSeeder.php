<?php

namespace Modules\Sections\Database\Seeders;

use Illuminate\Database\Seeder;

class SectionsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            SectionSeeder::class
        ]);
    }
}
