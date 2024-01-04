<?php

return [
    'connection' => [
        'host' => env('RABBITMQ_HOST', 'localhost'),
        'port' => env('RABBITMQ_PORT', 5672),
        'user' => env('RABBITMQ_USER', 'guest'),
        'pass' => env('RABBITMQ_PASS', 'guest'),
    ],
];
