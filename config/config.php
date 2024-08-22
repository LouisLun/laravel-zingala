<?php
return [
    // is sandbox
    'isSandbox' => env('ZINGALA_SANDBOX', false),

    // 0Card-Merchant-Id
    'merchantID' => env('ZINGALA_MARCHANT_ID', ''),

    // 0Card-API-Key
    'apiKey' => env('ZINGALA_API_KEY', ''),

    // AESKEY(HMAC-SHA256解密我方回傳notify_url時的客戶資料)
    'aesKey' => env('ZINGALA_AES_KEY', ''),

    // AESIV(HMAC-SHA256解密我方回傳notify_url時的客戶資料)
    'aesIV' => env('ZINGALA_AES_IV', ''),
];
