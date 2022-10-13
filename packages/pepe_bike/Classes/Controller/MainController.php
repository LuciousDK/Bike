<?php

declare (strict_types = 1);

namespace Luat\PepeBike\Controller;

/**
 * MainController
 */
class MainController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController

{

    /**
     * Init the actions
     */
    public function initializeAction()
    {
        // $ffs = GeneralUtility::makeInstance(FlexFormService::class);

        // $contentObject = $this->configurationManager->getContentObject();
        // $contentElement = $contentObject->data;
        // $this->data = $contentElement;

        // $flex = $ffs->convertFlexFormContentToArray($contentElement['pi_flexform']);

        // $this->data = array_merge($this->data, $flex);
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
    }

}
