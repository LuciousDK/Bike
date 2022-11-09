<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$_EXTKEY = 'pepebike';


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Luat.PepeBike',
    'List',
    array( // An array holding the controller-action-combinations that are accessible
        'Main' => 'list,create,update,detail', // The first controller and its first action will be the default
    ),
    array( // An array of non-cachable controller-action-combinations (they must already be enabled)
        'Main' => 'list,create,update,detail',
    )
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Luat.PepeBike',
    'Api',
    array( // An array holding the controller-action-combinations that are accessible
        'Json' => 'list', // The first controller and its first action will be the default
    ),
    array( // An array of non-cachable controller-action-combinations (they must already be enabled)
        'Json' => 'list',
    )
);

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

$iconRegistry->registerIcon(
    'pepe-bike',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:pepebike/Resources/Public/Icons/Extension.gif']
);
