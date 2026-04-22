<?php

return [
    /*
    |--------------------------------------------------------------------------
    | URL Encryption Secret
    |--------------------------------------------------------------------------
    |
    | This value is used to encrypt and decrypt model route keys in URLs.
    | It should be a strong secret. For full security, set URL_SECRET to a
    | random 512-bit value in your .env file.
    |
    */

    'secret' => env('URL_SECRET', env('APP_KEY')),
];
