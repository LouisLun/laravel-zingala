<?php
namespace LouisLun\LaravelZingala\Contracts;

interface IZingala
{
    const API_HOST = 'https://api.chaileaseholding.com';

    const SANDBOX_API_HOST = 'https://uatapi.chaileaseholding.com';

    const REQUEST_PAYMENT = 'payment';

    const REQUEST_INQUIRY = 'inquiry';

    const REQUEST_REFUND = 'refund';

    const REQUEST_API_URL_MAP = [
        IZingala::REQUEST_PAYMENT => '/api_zero_card/payments/reserve_ec',
        IZingala::REQUEST_INQUIRY => '/api_zero_card/payments/inquiry',
        IZingala::REQUEST_REFUND => '/api_zero_card/payments/refund',
    ];
}
