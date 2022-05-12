<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */
    'google' => [
        'client_id' => '938328439970-ocvn3f8jvdd6hvbioqv3u3dlelovk5mt.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/callback/google',
    ],



    'mailgun' => [
        'domain' => env('xxxx'),
        'secret' => env('xxx'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
