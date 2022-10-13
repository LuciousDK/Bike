<?php

declare (strict_types = 1);

namespace Luat\PepeBike\Controller;

use \Luat\PepeBike\Domain\Repository\BicycleRepository;
use \Luat\PepeBike\Domain\Repository\BrandRepository;

/**
 * MainController
 */
class MainController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController

{

    /**
     * @var BicycleRepository
     */
    protected $bicycleRepository;

    /**
     * Inject a bicycle repository
     *
     * @param BicycleRepository $bicycleRepository
     */
    public function injectBicycleRepository(BicycleRepository $bicycleRepository)
    {
        $this->bicycleRepository = $bicycleRepository;
    }

    /**
     * @var BrandRepository
     */
    protected $brandRepository;

    /**
     * Inject a brand repository
     *
     * @param BrandRepository $brandRepository
     */
    public function injectBrandRepository(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

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
        $this->view->assign('bicycles', $this->bicycleRepository->findAll());
        $this->view->assign('brand', $this->brandRepository->findAll());
    }

}
