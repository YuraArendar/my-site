<?php

namespace Application\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(__DIR__.'/../views','admin');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('admin',function($app){
            return new Admin;
        });
    }
}
