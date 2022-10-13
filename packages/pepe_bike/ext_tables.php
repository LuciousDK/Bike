<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

call_user_func(
    function()
    {
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
    }
);
