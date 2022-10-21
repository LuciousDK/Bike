<?php

declare (strict_types = 1);

namespace Luat\PepeBike\Controller;

use TYPO3\CMS\Extbase\Annotation as Extbase;

use Luat\PepeBike\Domain\Model\Bicycle;
use Luat\PepeBike\Domain\Repository\BicycleRepository;
use Luat\PepeBike\Domain\Repository\BrandRepository;
use Luat\PepeBike\Domain\Repository\ClientRepository;
use TYPO3\CMS\Extbase\Property\PropertyMapper;

/**
 * MainController
 */
class MainController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController

{

    /**
     * @var PropertyMapper
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $propertyMapper;

    /**
     * @var BicycleRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $bicycleRepository;

    /**
     * @var BrandRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $brandRepository;

    /**
     * @var ClientRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $clientRepository;

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
        $bicycles =$this->bicycleRepository->findAll();
        $this->view->assign('bicycles', $bicycles);

        $brand = $this->brandRepository->findAll();
        $this->view->assign('brand', $brand);
        
        $clients = $this->clientRepository->findAll();
        $this->view->assign('clients', $clients);
    }


    /**
     * Initialize create action
     * @return void
     */
    public function initializeCreateAction()
    {
        if ($this->request->hasArgument('newBicycle')) {
            $newBicycle = $this->request->getArgument('newBicycle');
            $this->propertyMapper->convert(
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
            $this->propertyMapper->convert(
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
