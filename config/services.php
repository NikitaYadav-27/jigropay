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

    'easebuzz' => [
        'ai_base_url' => env('EASEBUZZ_AI_BASE_URL', 'https://bbps-api.easebuzz.dev'),
        'ledger_base_url' => env('EASEBUZZ_LEDGER_BASE_URL', 'https://bbps-ledger.easebuzz.in'),
        'client_key' => env('EASEBUZZ_CLIENT_KEY', '3a86a744-ee83-499b-b0f2-3fb9278db0d1'),
        'client_secret' => env('EASEBUZZ_CLIENT_SECRET', '$2b$10$E1EkU6p7h/iIyqn3DoBPjlGg6bN6xGWDn0bGWa45SGd2ezos/FBCL'),
        'x_key' => env('EASEBUZZ_X_KEY', '58D795907E'),
        'agent_id' => env('EASEBUZZ_AGENT_ID', 'EB10EB11INT514672037'),
        'salt' => env('EASEBUZZ_SALT', '037027BA97'),
    ],

];
