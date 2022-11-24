<?php

declare (strict_types = 1);

namespace Luat\PepeBike\Controller;

use Luat\PepeBike\Domain\Model\Bicycle;
use Luat\PepeBike\Domain\Repository\BicycleRepository;
use Luat\PepeBike\Domain\Repository\BrandRepository;
use Luat\PepeBike\Domain\Repository\ClientRepository;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Property\PropertyMapper;
use TYPO3\CMS\Extbase\Property\PropertyMappingConfigurationBuilder;

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
     * @var PropertyMappingConfigurationBuilder
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $propertyMappingConfigurationBuilder;

    /**
     * @var PersistenceManager
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $persistenceManager;

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
                Bicycle::class,
                $mappingConfiguration
            );
        }
    }

    /**
     * Error Action
     */
    public function errorAction()
    {
        $this->clearCacheOnError();
        $this->addErrorFlashMessage();
        $this->forwardToReferringRequest();
        return $this->getFlattenedValidationErrorMessage();
    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction(Bicycle $bicycle = null)
    {
        $bicycles = $this->bicycleRepository->findAll();
        $this->view->assign('bicycles', $bicycles);

        $brands = $this->brandRepository->findAll();
        $this->view->assign('brands', $brands);

        $clients = $this->clientRepository->findAll();
        $this->view->assign('clients', $clients);

        if ($this->request->hasArgument('brandUid')) {

            $this->view->assign('brandFilter', $this->request->getArgument('brandUid'));
        }
    }

    /**
     * action detail
     * @param Bicycle $bicycle
     * @return void
     */
    public function detailAction(Bicycle $bicycle = null)
    {
        if (!$this->request->hasArgument('bicycleUid')) {
            $this->throwStatus(404, 'Bad Request', '"bicycleUid" parameter missing from request.');
        }

        $uid = $this->request->getArgument('bicycleUid');
        $bicycle = $this->bicycleRepository->findByUid($uid);
        if (!$bicycle) {
            $this->throwStatus(404, 'Bad Request', 'No bicycle found with uid "' . $uid . '"');
        }

        $brands = $this->brandRepository->findAll();
        $this->view->assign('brands', $brands);

        $clients = $this->clientRepository->findAll();
        $this->view->assign('clients', $clients);

        $this->view->assign('bicycle', $bicycle);
    }
    /**
     * Init Create Action. This happens after "initializeAction"
     */
    public function initializeCreateAction()
    {
    }

    /**
     * action create
     * @param Bicycle $bicycle
     * @return void
     */
    public function createAction(Bicycle $bicycle)
    {
        $this->bicycleRepository->add($bicycle);
        $this->persistenceManager->persistAll();
        $this->redirect('detail', null, null, ['bicycleUid' => $bicycle->getUid()]);
    }

    /**
     * action update
     * @param Bicycle $bicycle
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("bicycle")
     * @return void
     */
    public function updateAction(Bicycle $bicycle)
    {
        $this->bicycleRepository->update($bicycle);
        $this->redirect('detail', null, null, ['bicycleUid' => $bicycle->getUid()]);
    }

}
