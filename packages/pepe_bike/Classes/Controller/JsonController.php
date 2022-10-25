<?php

declare (strict_types = 1);

namespace Luat\PepeBike\Controller;

use Luat\PepeBike\Domain\Model\Bicycle;
use Luat\PepeBike\Domain\Repository\BicycleRepository;
use Luat\PepeBike\Domain\Repository\BrandRepository;
use Luat\PepeBike\Domain\Repository\ClientRepository;
use TYPO3\CMS\Extbase\Property\PropertyMapper;
use TYPO3\CMS\Extbase\Property\PropertyMappingConfigurationBuilder;

/**
 * JsonController
 */
class JsonController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController

{
    /**
     * @var \TYPO3\CMS\Extbase\Mvc\View\JsonView
     */
    protected $view;

    /**
     * @var string
     */
    protected $defaultViewObjectName = \TYPO3\CMS\Extbase\Mvc\View\JsonView::class;

    /**
     * @var PropertyMapper
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $propertyMapper;

    /**
     * @var PropertyMappingConfigurationBuilder
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $propertyMappingConfigurationBuilder;


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
        if ($this->request->hasArgument('bicycle')) {
            $bicycle = $this->request->getArgument('bicycle');

            // Get property mapping configuration
            $mappingConfiguration = $this->propertyMappingConfigurationBuilder->build();
            // Adjust configuration to allow mapping of sub property 'usergroup'
            $mappingConfiguration->forProperty('clients')
                ->allowAllProperties();

            $this->propertyMapper->convert(
                $bicycle,
                Bicycle::class, $mappingConfiguration
            );
        }
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction(Bicycle $bicycle = null)
    {
        $bicycles = $this->bicycleRepository->findAll();

        $brands = $this->brandRepository->findAll();

        $clients = $this->clientRepository->findAll();
        $data = [
            'bicycles' =>$bicycles,
            'brands' => $brands,
            'clients' => $clients
        ];
        $this->view->assign('value',$data);
    }

}
