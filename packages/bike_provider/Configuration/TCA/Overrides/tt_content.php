<?php
defined('TYPO3_MODE') || die();
call_user_func(function()
{
    /**
     * Temporary variables
     */
    $extensionKey = 'bike_provider';

    // Adds the content element to the "Type" dropdown
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
        'tt_content',
        'CType',
         [
             // title
             'Random Image',
             // plugin signature: extkey_identifier
             'bikeprovider_randomimage',
             // icon identifier
             'image',
         ],
     );
});