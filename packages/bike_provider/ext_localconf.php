<?php
defined('TYPO3_MODE') || die();
/***************
 * Add default RTE configuration
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['bike_provider'] = 'EXT:bike_provider/Configuration/RTE/Default.yaml';

/***************
 * PageTS
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:bike_provider/Configuration/TsConfig/Page/All.tsconfig">');

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

$iconRegistry->registerIcon(
    'image',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source' => 'EXT:bike_provider/Resources/Public/Icons/image.svg']
);

// // Register for hook to show preview of tt_content element of CType="bikeprovider_randomimage" in page module
// $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['bikeprovider_randomimage'] =
// \Luat\BikeProvider\Hooks\PageLayoutView\RandomImagePreviewRenderer::class;
