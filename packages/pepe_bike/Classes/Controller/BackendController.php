<?php

declare (strict_types = 1);

namespace Luat\PepeBike\Controller;

use Luat\PepeBike\Domain\Model\Bicycle;
use Luat\PepeBike\Domain\Repository\BicycleRepository;
use Luat\PepeBike\Domain\Repository\BrandRepository;
use Luat\PepeBike\Domain\Repository\ClientRepository;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TYPO3\CMS\Extbase\Property\PropertyMapper;
use TYPO3\CMS\Extbase\Property\PropertyMappingConfigurationBuilder;

/**
 * BackendController
 */
class BackendController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController

{
    /**
     * Backend Template Container
     *
     * @var string
     */
    protected $defaultViewObjectName = \TYPO3\CMS\Backend\View\BackendTemplateView::class;

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

    }

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $bicycles = $this->bicycleRepository->findAll();
        $this->view->assign('bicycles', $bicycles);

        $brands = $this->brandRepository->findAll();
        $this->view->assign('brands', $brands);

        $clients = $this->clientRepository->findAll();
        $this->view->assign('clients', $clients);
    }

    /**
     * action detail
     * @return void
     */
    public function detailAction()
    {
        if (!$this->request->hasArgument('bicycleUid')) {
            $this->throwStatus(404, 'Bad Request', '"bicycleUid" parameter missing from request.');
        }

        $uid = $this->request->getArgument('bicycleUid');
        $bicycle = $this->bicycleRepository->findByUid($uid);
        if (!$bicycle) {
            $this->throwStatus(404, 'Bad Request', 'No bicycle found with uid "' . $uid . '"');
        }

        $this->view->assign('bicycle', $bicycle);
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
     * action create
     * @param Bicycle $bicycle
     * @return void
     */
    public function createAction(Bicycle $bicycle)
    {
        // $this->bicycleRepository->add($bicycle);
        // $this->persistenceManager->persistAll();
        // $this->redirect('detail', null, null, ['bicycleUid' => $bicycle->getUid()]);
    }

    /**
     * action update
     * @param Bicycle $bicycle
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("bicycle")
     * @return void
     */
    public function updateAction(Bicycle $bicycle)
    {
        // $this->bicycleRepository->update($bicycle);
        // $this->redirect('detail', null, null, ['bicycleUid' => $bicycle->getUid()]);
    }

    /**
     * @param ViewInterface $view
     */
    protected function initializeView(ViewInterface $view)
    {
        $pageRenderer = $this->objectManager->get(\TYPO3\CMS\Core\Page\PageRenderer::class);
        // if ($view->getModuleTemplate() !== null) {
        //     $pageRenderer = $view->getModuleTemplate()->getPageRenderer();

        $pageRenderer->loadRequireJsModule('TYPO3/CMS/Core/Ajax/AjaxRequest');
        //     $pageRenderer->loadRequireJsModule('TYPO3/CMS/Backend/Tooltip');
        //     $pageRenderer->loadRequireJsModule('TYPO3/CMS/Blog/Datatables');
        //     $pageRenderer->loadRequireJsModule('TYPO3/CMS/Blog/SetupWizard');
        //     $pageRenderer->loadRequireJsModule('TYPO3/CMS/Blog/MassUpdate');

        //     $pageRenderer->addCssFile('EXT:blog/Resources/Public/Css/backend.min.css', 'stylesheet', 'all', '', false);
        //     $pageRenderer->addCssFile('EXT:blog/Resources/Public/Css/Datatables.min.css', 'stylesheet', 'all', '', false);

        //     $view->assign('action', $this->actionMethodName);

        // }
    }
}
