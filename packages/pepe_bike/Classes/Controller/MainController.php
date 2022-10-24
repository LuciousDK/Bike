<?php

declare (strict_types = 1);

namespace Luat\PepeBike\Controller;

use Luat\PepeBike\Domain\Model\Bicycle;
use Luat\PepeBike\Domain\Repository\BicycleRepository;
use Luat\PepeBike\Domain\Repository\BrandRepository;
use Luat\PepeBike\Domain\Repository\ClientRepository;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
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
            $this->propertyMapper->convert(
                $bicycle,
                Bicycle::class
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
        $this->view->assign('bicycles', $bicycles);

        $brand = $this->brandRepository->findAll();
        $this->view->assign('brand', $brand);

        $clients = $this->clientRepository->findAll();
        $this->view->assign('clients', $clients);
    }

    /**
     * action detail
     * @param Bicycle $bicycle
     * @return void
     */
    public function detailAction(Bicycle $bicycle = null)
    {
        if($this->request->hasArgument('bicycleUid')){
            $uid = $this->request->getArgument('bicycleUid');
            $this->view->assign('bicycle', $this->bicycleRepository->findByUid($uid));
        }else{
            // TODO: error.
        };
    }

    /**
     * action create
     * @param Bicycle $bicycle
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("bicycle")
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
    }

}
