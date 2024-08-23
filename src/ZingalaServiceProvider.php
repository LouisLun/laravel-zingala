<?php
namespace LouisLun\LaravelZingala;

use Illuminate\Support\ServiceProvider;

class ZingalaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Zingala::class, function ($app) {
            return new Zingala($app['config']['zingala']);
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('zingala.php'),
        ], 'zingala');
    }
}
