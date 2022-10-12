<?php

/**
 * Extension Manager/Repository config file for ext "bike_provider".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Bike Provider',
    'description' => '',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
            'fluid_styled_content' => '10.4.0-10.4.99',
            'rte_ckeditor' => '10.4.0-10.4.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Luat\\BikeProvider\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Luat Dinh',
    'author_email' => 'ldinhbui@gmail.com',
    'author_company' => 'Luat',
    'version' => '1.0.0',
];
