<?php

return [
    'send-email' => [
        'path' => '/send-email',
        'access' => 'public',
        'target' => \Luat\PepeBike\Controller\RouteController::class . '::ajaxAction',
    ],
];
