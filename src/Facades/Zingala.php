<?php
namespace LouisLun\LaravelZingala\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \LouisLun\LaravelZingala\Response payment($params) 向Zingala請求付款
 * @method static \LouisLun\LaravelZingala\Response refund($params) 退款
 * @method static \LouisLun\LaravelZingala\Response inquiry($params) 查詢交易紀錄
 * @method static \LouisLun\LaravelZingala\Crypto crypto() 加解密器
 *
 * {@see \LouisLun\LaravelZingala\Zingala}
 */
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
