<?php

return [
    'send_email' => [
        'path' => '/send-email',
        'access' => 'public',
        'target' => \Luat\PepeBike\Controller\RouteController::class . '::ajaxAction',
    ],
    'hide_bike' => [
        'path' => '/hide-bike',
        'access' => 'public',
        'target' => \Luat\PepeBike\Controller\BicycleCrudController::class . '::hideAction',
    ],
];
