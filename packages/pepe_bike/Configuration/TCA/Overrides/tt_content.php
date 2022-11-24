<?php

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'PepeBike',
    'List',
    'Bike List',
    'pepe-bike'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'PepeBike',
    'Api',
    'Bike API',
    'pepe-bike'
);

$GLOBALS['TCA']['tt_content']['types']['list']['previewRenderer']['pepebike_list'] = \Luat\PepeBike\Preview\ListPreviewRenderer::class;

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['pepebike_list'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'pepebike_list',
    'FILE:EXT:pepebike/Configuration/FlexForms/List.xml'
);
