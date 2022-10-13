<?php
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
    'pepebike',
    'tx_pepebike_domain_model_bicycle',
    'categories',
    [
        'position' => 'replace:categories'
    ]
);