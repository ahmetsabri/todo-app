<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $developers = [
            ['name' => 'DEV1', 'effort_per_Hour' => 1],
            ['name' => 'DEV2', 'effort_per_Hour' => 2],
            ['name' => 'DEV3', 'effort_per_Hour' => 3],
            ['name' => 'DEV4', 'effort_per_Hour' => 4],
            ['name' => 'DEV5', 'effort_per_Hour' => 5],

        ];
        foreach ($developers as $developer) {
            Developer::create($developer);
        }
    }
}
