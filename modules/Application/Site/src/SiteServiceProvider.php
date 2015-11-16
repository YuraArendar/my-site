<?php

namespace Application\Site;

use Illuminate\Support\ServiceProvider;

class SiteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // include fil with Site routes
        require __DIR__ . '/Http/routes.php';
        // include views
        $this->loadViewsFrom(__DIR__.'/../views','site');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('site',function($app){
            return new Site;
        });
    }
}
