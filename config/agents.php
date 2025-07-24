<?php

return [
    'ingredients' => [
        'model' => env('AGENT_INGREDIENTS_MODEL', 'gpt-4o-mini'),
        'temperature' => env('AGENT_INGREDIENTS_TEMPERATURE', 0),
        'max_tokens' => env('AGENT_INGREDIENTS_MAX_TOKENS'),
    ],
    'tools' => [
        'model' => env('AGENT_TOOLS_MODEL', 'gpt-4o-mini'),
        'temperature' => env('AGENT_TOOLS_TEMPERATURE', 0),
        'max_tokens' => env('AGENT_TOOLS_MAX_TOKENS'),
    ],
    'recipe' => [
        'model' => env('AGENT_RECIPE_MODEL', 'gpt-4o-mini'),
        'temperature' => env('AGENT_RECIPE_TEMPERATURE', 0),
        'max_tokens' => env('AGENT_RECIPE_MAX_TOKENS'),
    ],
];
