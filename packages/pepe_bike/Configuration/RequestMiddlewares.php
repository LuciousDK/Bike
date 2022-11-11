<?php 
return [
    'backend' => [
        'middleware-identifier' => [
            'target' => \Luat\PepeBike\Middleware\ExampleMiddleware::class,
            'before' => [
                'another-middleware-identifier',
            ],
            'after' => [
                'yet-another-middleware-identifier',
            ],
        ],
    ],
];
