<?php

return [
    'providers' => [
        'openai' => [
            'api_key' => env('OPENAI_API_KEY', ''),
            'organization' => env('OPENAI_ORGANIZATION', null),
            'project' => env('OPENAI_PROJECT', null),
        ],
    ],
];
