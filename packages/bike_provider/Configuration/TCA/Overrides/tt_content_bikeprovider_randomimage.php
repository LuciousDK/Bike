<?php
defined('TYPO3_MODE') || die();
call_user_func(function () {

    $additionalColumns = [
        'tx_bikeprovider_generatedurl' => [
            'label' => 'Image Url',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputLink',
                'readOnly' => true,
                'size' => 100,
            ],
        ],

        'tx_bikeprovider_width' => [
            'label' => 'Width',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'int',
                'default' => 500,
                'required' => true,
            ],
        ],
        'tx_bikeprovider_height' => [
            'label' => 'Height',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'int',
                'default' => 500,
                'required' => true,
            ],
        ],
    ];

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $additionalColumns);

    // Configure the default backend fields for the content element
    $GLOBALS['TCA']['tt_content']['types']['bikeprovider_randomimage'] = [
        'showitem' => '
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;;general,
                header; Internal title (not displayed),
                tx_bikeprovider_generatedurl; Generated Url,
                --palette--;;bikeprovider_randomimage,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
       ',
    ];

    // Configure the default backend fields for the content element
    $GLOBALS['TCA']['tt_content']['palettes']['bikeprovider_randomimage']['showitem'] = 'tx_bikeprovider_width,tx_bikeprovider_height';
    
    $GLOBALS['TCA']['tt_content']['types']['bikeprovider_randomimage']['previewRenderer'] = \Luat\BikeProvider\Preview\RandomImageFluidPreviewRenderer::class;

});
