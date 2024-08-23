# laravel-zingala

Laravel Zingala 為針對 Laravel 所寫的金流套件，實作統一付款功能

## 安裝

```
composer require louislun/laravel-zingala
```

### 註冊套件

> Laravel 5.5 以上會自動註冊套件，可以跳過此步驟

在 `config/app.php` 註冊套件和增加別名：

```php
    'providers' => [
        ...
        /*
         * Package Service Providers...
         */
        \LouisLun\LaraveZingala\ZingalaServiceProvider::class,
    ],
    'aliases' => [
        ...
        'Linepay' => \LouisLun\LaraveZingala\Facades\Zingala::class,
    ]
```

### 發布設置檔案

```
php artisan vendor:publish --provider="LouisLun\LaravelZingala\ZingalaServiceProvider"
```

## 使用

## License

[MIT](./LICENSE)