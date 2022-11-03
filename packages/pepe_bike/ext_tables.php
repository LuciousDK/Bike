<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pepebike_domain_model_bicycle');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_pepebike_domain_model_bicycle',
    'Bicycle'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pepebike_domain_model_brand');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
    'tx_pepebike_domain_model_brand',
    'Bicycle'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addModule(
    'pepebike',
    '',
    'top',
    null,
    [
        'labels' => 'PepeBike',
        'name' => 'pepebike',
        'iconIdentifier' => 'pepe-bike',
    ]
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
    'PepeBike',
    'pepebike',
    'pepebike_list',
    '',
    [
        \Luat\PepeBike\Controller\BackendController::class => 'list,create,update,detail'
    ],
    [
        'access' => 'admin',
        'iconIdentifier' => 'pepe-bike',
        'labels' => 'Hola',
    ]
);
