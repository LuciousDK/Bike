<?php

defined('TYPO3') or die('Access denied.');
call_user_func(function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'PepeBike',
        'List',
        'Bike List',
        'pepe-bike'
    );
});