<?php

return [
    'ctrl' => [
        'title' => 'Bicycle',
        'label' => 'model',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY crdate DESC',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'typeicon_classes' => [
            'default' => 'pepe-bike'
        ],
        'searchFields' => 'uid,brand,model,color',
    ],
    'columns' => [
        'pid' => [
            'label' => 'pid',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'crdate' => [
            'label' => 'crdate',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'tstamp' => [
            'label' => 'tstamp',
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'default' => 0,
            ],
        ],
        'brand' => [
            'label' => 'Brand',
            'config' => [
                'type' => 'group',
                'internal_type' => 'db',
                'allowed' => 'tx_pepebike_domain_model_brand',
                'size' => 1,
                'maxitems' => 1,
                'minitems' => 0,
                'default' => null,
                'fieldWizard' => [
                    'recordsOverview' => [
                        'disabled' => true
                    ]
                ]
            ],
        ],
        'model' => [
            'label' => 'Model',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => '',
            ],
        ],
        'color' => [
            'label' => 'Color',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => '',
            ],
        ],
        'wheels' => [
            'label' => 'Wheels',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'int',
                'default' => 2,
            ],
        ],
    ],
    'types' => [
        0 => [
            'showitem' => 'brand,model,color,wheels',
        ],
    ],
    'palettes' => [
        'paletteCore' => [
            'showitem' => 'hidden,',
            'canNotCollapse' => true,
        ],
    ],
];