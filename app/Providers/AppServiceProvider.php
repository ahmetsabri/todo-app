<?php

namespace App\Providers;

use App\Repositories\DeveloperRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(DeveloperRepository::class, function ($app) {
            return new DeveloperRepository;
        });
    }
}
