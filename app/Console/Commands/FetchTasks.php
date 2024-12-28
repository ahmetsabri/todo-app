<?php

namespace App\Console\Commands;

use App\Models\Task;
use App\Models\TaskProvider;
use App\Services\MockOneTaskkAdapter;
use App\Services\MockTwoTaskkAdapter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get tasks from providers APIs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $providers = TaskProvider::all();

        foreach ($providers as $provider) {
            Http::get($provider->url)->collect()->each(function ($task) use ($provider) {
                $adapter = match ($provider->name) {
                    'mock-one' => new MockOneTaskkAdapter($task, $provider->name),
                    'mock-two' => new MockTwoTaskkAdapter($task, $provider->name),
                    default => null,
                };

                Task::create([
                    'name' => $adapter->getName(),
                    'duration' => $adapter->getDuration(),
                    'difficulty' => $adapter->getDifficulty(),
                ]);
            });
        }

        $this->info('Tasks fetched successfully');
    }
}
