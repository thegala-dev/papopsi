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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'ipinfo' => [
        'token' => env('IPINFO_TOKEN'),
        'localhost_ip' => env('IPINFO_LOCALHOST_IP', '8.8.8.8'),
        'invalid_ips' => [
            '127.0.0.1',
            '::1',
            'localhost',
            '172.27.0.1',
            '172.27.0.2',
            '172.27.0.3',
            '172.27.0.4',
            '172.27.0.5',
            '172.27.0.6',
            '172.27.0.7',
            '172.27.0.8',
            '172.27.0.9',
            '172.27.0.10',
        ],
    ],
];
