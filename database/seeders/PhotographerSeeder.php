<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Photographer;

class PhotographerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photographer::factory()
            ->times(1)
            ->create();
    }
}
