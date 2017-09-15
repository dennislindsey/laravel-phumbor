<?php

namespace dennislindsey\LaravelPhumbor;

use Illuminate\Support\ServiceProvider;

class LaravelPhumborServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/laravel-phumbor.php' => config_path('laravel-phumbor.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('phumbor', function ($app) {
            return \Thumbor\Url\BuilderFactory::construct(config('laravel-phumbor.server'), config('laravel-phumbor.key'));
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['phumbor'];
    }
}
