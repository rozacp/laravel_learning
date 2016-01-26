<?php

namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;
use App\Harvester\Harvester;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // ne deli tega ker zajebejo migracije
        //$latest = Article::published()->latest()->first();
        //
        //view()->share('latest', $latest);

        view()->composer('layouts.app', function ($view) {
            $view->with('latest', Article::published()->latest()->first());
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('harvester', Harvester::class);
    }
}
