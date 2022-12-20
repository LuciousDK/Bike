<?php

return [
    'ctrl' => [
        'title' => 'LLL:EXT:pepebike/Resources/Private/Language/locallang_be.xlf:extension.brand',
        'label' => 'name',
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
        'searchFields' => 'uid,name',
        'languageField' => 'sys_language_uid', //current language
        'transOrigPointerField' => 'l18n_parent', //default language record
        'transOrigDiffSourceField' => 'l18n_diffsource', //tracks changes on translations
        'translationSource' => 'l10n_source', //id record was translated from
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
        'name' => [
            'label' => 'Name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => '',
            ],
        ],
        'bicycles' => [
            'label' => 'Bicycles',
            'config' => [
                // 'readOnly' => true,
                'type' => 'inline',
                'foreign_table' => 'tx_pepebike_domain_model_bicycle',
                'foreign_field' => 'brand',
            ],
        ],
    ],
    'types' => [
        0 => [
            'showitem' => 'name,bicycles',
        ],
    ],
    'palettes' => [
        'paletteCore' => [
            'showitem' => 'hidden',
            'canNotCollapse' => true,
        ],
    ],
];