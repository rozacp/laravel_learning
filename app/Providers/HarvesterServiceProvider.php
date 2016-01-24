<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Harvester\Harvester;

class HarvesterServiceProvider extends ServiceProvider
{

    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('harvester', Harvester::class);
    }
}
