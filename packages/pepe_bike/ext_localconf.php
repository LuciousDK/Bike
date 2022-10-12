<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$_EXTKEY = 'pepe_bike';

call_user_func(
    function () {
        
        // \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        //     'VdiSearch',
        //     'Pi1',
        //     'VDI Search'
        // );

        // \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        //     'Cbe.VdiSearch',
        //     'Pi1',
        //     array( // An array holding the controller-action-combinations that are accessible
        //         'Search' => 'index,ajaxsearch', // The first controller and its first action will be the default
        //     ),
        //     array( // An array of non-cachable controller-action-combinations (they must already be enabled)
        //         'Search' => 'index,ajaxsearch',
        //     )
        // );

        // wizards
        // \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        //     'mod {
        //         wizards.newContentElement.wizardItems.plugins {
        //             elements {
        //                 vdisearch_pi1 {
        //                     iconIdentifier = vdi_search-plugin
        //                     title = VDI Search
        //                     description = Suchmaschine für Inhalte innerhalb der Website und des API-Dienstes
        //                     tt_content_defValues {
        //                         CType = list
        //                         list_type = vdisearch_pi1
        //                     },
        //                 }
        //             }
        //             show = *
        //         }
        //    }'
        // );

        // $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

        // $iconRegistry->registerIcon(
        //     'vdi_search-plugin',
        //     \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        //     ['source' => 'EXT:vdi_search/Resources/Public/Icons/vdipage.gif']
        // );
    }
);
