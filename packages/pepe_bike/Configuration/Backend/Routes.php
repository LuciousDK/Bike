<?php

return [

    // Main backend rendering setup (previously called backend.php) for the TYPO3 Backend
    'pepa' => [
        'path' => '/pepa',
        'access' => 'public',
        'target' => \Luat\PepeBike\Controller\RouteController::class . '::mainAction'
    ],
    'send-static-email' => [
        'path' => '/send-static-email',
        'access' => 'public',
        'target' => \Luat\PepeBike\Controller\RouteController::class . '::sendStaticEmailAction',
    ],
    'send-fluid-email' => [
        'path' => '/send-fluid-email',
        'access' => 'public',
        'target' => \Luat\PepeBike\Controller\RouteController::class . '::sendFluidEmailAction',
    ],
   // ...
];