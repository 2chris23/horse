<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Resend, Postmark, AWS, and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'facebook' => [
        'app_id' => env('FACEBOOK_APP_ID', '260261811093896'),
        'app_secret' => env('FACEBOOK_APP_SECRET', 'e187bab0c860245f535742d8f882866e'),
        'client_token' => env('FACEBOOK_CLIENT_TOKEN', '67741d946b419efb08e46fb624da5157'),
        'client_id' => env('FACEBOOK_CLIENT_ID', '260261811093896'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET', 'e187bab0c860245f535742d8f882866e'),
        'redirect' => env('FACEBOOK_REDIRECT', 'https://app.horsesworldsale.com/authv1/facebook/callback'),
    ],

];
