<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$_EXTKEY = 'pepebike';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:pepebike/Configuration/TsConfig/Page/Mod/Wizards/NewContentElement.tsconfig">'
);

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

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

$iconRegistry->registerIcon(
    'pepe-bike',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:pepebike/Resources/Public/Icons/Extension.gif']
);
