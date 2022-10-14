<?php

declare (strict_types = 1);

namespace Luat\PepeBike\Controller;

use TYPO3\CMS\Extbase\Annotation as Extbase;

use Luat\PepeBike\Domain\Model\Bicycle;
use Luat\PepeBike\Domain\Repository\BicycleRepository;
use Luat\PepeBike\Domain\Repository\BrandRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Property\PropertyMapper;

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


    /**
     * Initialize create action
     * @return void
     */
    public function initializeCreateAction()
    {
        if ($this->request->hasArgument('newBicycle')) {
            $newBicycle = $this->request->getArgument('newBicycle');
            GeneralUtility::makeInstance(PropertyMapper::class)->convert(
                $newBicycle,
                Bicycle::class
            );
        }
    }
    /**
     * action create
     * @param Bicycle $newBicycle
     * @Extbase\IgnoreValidation("newBicycle")
     * @return void
     */
    public function createAction(Bicycle $newBicycle = null)
    {
        $this->bicycleRepository->add($newBicycle);
    }


    /**
     * Initialize update action
     * @return void
     */
    public function initializeUpdateAction()
    {
        if ($this->request->hasArgument('bicycle')) {
            $bicycle = $this->request->getArgument('bicycle');
            GeneralUtility::makeInstance(PropertyMapper::class)->convert(
                $bicycle,
                Bicycle::class
            );
        }
    }
    /**
     * action update
     * @param Bicycle $bicycle
     * @Extbase\IgnoreValidation("bicycle")
     * @return void
     */
    public function updateAction(Bicycle $bicycle = null)
    {
        $this->bicycleRepository->update($bicycle);
    }

}
