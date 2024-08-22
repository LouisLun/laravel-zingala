<?php
namespace LouisLun\LaravelZingala;

use Illuminate\Support\ServiceProvider;

class ZingalaServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('zingala.php'),
        ], 'zingala');
    }
}
