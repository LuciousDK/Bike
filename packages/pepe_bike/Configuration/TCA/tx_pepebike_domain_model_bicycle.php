<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:pepebike/Resources/Private/Language/locallang_be.xlf:extension.bicycle',
        'label' => 'model',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'default_sortby' => 'ORDER BY crdate DESC',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
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
            'exclude' => true,
            'label' => 'Hidden',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
                'items' => [
                    [
                        0 => '',
                        1 => '',
                    ]
                ],
            ]
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038),
                ],
            ],
            'l10n_mode' => 'exclude',
            'l10n_display' => 'defaultAsReadonly',
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
            'showitem' => '
                    --palette--;;paletteBrand,--palette--;;paletteCore,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;paletteHidden,
                    --palette--;;paletteAccess,',
        ],
    ],
    'palettes' => [
        'paletteBrand' => [
            'showitem' => 'brand',
        ],
        'paletteCore' => [
            'showitem' => 'model,color,wheels',
        ],
        'paletteHidden' => [
            'showitem' => 'hidden,deleted ',
        ],
        'paletteAccess' => [
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access',
            'showitem' => '
                starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
                endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel,
            ',
        ],
    ],
];