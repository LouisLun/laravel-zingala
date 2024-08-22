<?php
namespace LouisLun\LaravelZingala\Facades;

use Illuminate\Support\Facades\Facade;

class Zingala extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \LouisLun\LaravelZingala\Zingala::class;
    }
}
