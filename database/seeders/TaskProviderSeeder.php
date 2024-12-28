<?php

namespace Database\Seeders;

use App\Models\TaskProvider;
use Illuminate\Database\Seeder;

class TaskProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $providers = [
            [
                'name' => 'mock-one',
                'url' => 'https://raw.githubusercontent.com/WEG-Technology/mock/refs/heads/main/mock-one',

            ],
            [
                'name' => 'mock-two',
                'url' => 'https://raw.githubusercontent.com/WEG-Technology/mock/refs/heads/main/mock-two',
            ],
        ];

        foreach ($providers as $provider) {
            TaskProvider::create($provider);
        }
    }
}
