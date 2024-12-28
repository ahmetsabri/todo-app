<?php

namespace App\Console\Commands;

use App\Models\TaskProvider;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class AddProvider extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:add-provider';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new provider';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Name', 'Mock'.rand());
        $url = $this->ask('URL');

        if (! filter_var($url, FILTER_VALIDATE_URL)) {
            $this->error('Invalid URL');

            return;
        }

        $className = $this->ask('Adapter class name', $name.'Adaptar');
        TaskProvider::create([
            'name' => $name,
            'url' => $url,
        ]);

        Artisan::call('make:class Services/'.$className);

        $this->info('Added Successfully 🎉');
        $this->line('Adapter: app/Services/'.$className.'.php ');
        $this->line('Just define it in : app/Console/Commands/FetchTasks.php');
        $this->line('\''.$name.'\' => new '. $className.'($task, $provider->name)');
    }
}
