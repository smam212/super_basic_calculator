<?php

namespace App\Providers;

use App\Services\CalculateService\CalculateService;
use App\Services\CalculateService\Contracts\ICalculateService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->bind(
            ICalculateService::class,
            CalculateService::class,
        );
    }
}
