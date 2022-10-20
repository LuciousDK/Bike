<?php

$additionalColumns = [
    // 'tx_pepebike_bicycle' => [
    //     'label' => 'Bicycle',
    //     'config' => [
    //         'type' => 'group',
    //         'internal_type' => 'db',
    //         'allowed' => 'tx_pepebike_domain_model_bicycle',
    //         'size' => 1,
    //         'maxitems' => 99,
    //         'minitems' => 0,
    //         'default' => null,
    //         'fieldWizard' => [
    //             'recordsOverview' => [
    //                 'disabled' => true,
    //             ],
    //         ],
    //     ],
    // ],
    'tx_pepebike_bicycles' => [
        'label' => 'Bicycles',
        'config' => [
            'type' => 'group',
            'size' => 5,
            'internal_type' => 'db',
            'allowed' => 'tx_pepebike_domain_model_bicycle',
            'foreign_table' => 'tx_pepebike_domain_model_bicycle',
            'MM' => 'tx_pepebike_feuser_bicycle_mm',
            'MM_opposite_field' => 'clients',
            'maxitems' => 1000,
        ],
        'l10n_mode' => 'exclude',
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users', $additionalColumns);
// Add blog specific fields to blog categories
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'fe_users',
    'tx_pepebike_bicycles',
    '0',
    'after:username'
);
