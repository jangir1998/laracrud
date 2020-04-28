<?php

namespace gkblabs\subscription;

use Illuminate\Support\ServiceProvider;

class subscriptionServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Register the routes in Service provider
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');   // add by hemant

        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'gkblabs');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'gkblabs');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
        
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/subscription.php', 'subscription');

        // Register the service the package provides.
        $this->app->singleton('subscription', function ($app) {
            return new subscription;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['subscription'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/subscription.php' => config_path('subscription.php'),
        ], 'subscription.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/gkblabs'),
        ], 'subscription.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/gkblabs'),
        ], 'subscription.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/gkblabs'),
        ], 'subscription.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
