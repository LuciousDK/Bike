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
