<?php

declare (strict_types = 1);

namespace Luat\PepeBike\Controller;

use Luat\PepeBike\Domain\Model\Bicycle;
use Luat\PepeBike\Domain\Repository\BicycleRepository;
use Luat\PepeBike\Domain\Repository\BrandRepository;
use Luat\PepeBike\Domain\Repository\ClientRepository;
use TYPO3\CMS\Core\Page\PageRenderer;
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
     * @var PageRenderer
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $pageRenderer;

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
        $bicycles = $this->bicycleRepository->findAllIncludingHidden();
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

    public function initializeUpdateHiddenStatusAction()
    {
        if ($this->request->hasArgument('status')) {
            $status = filter_var($this->request->getArgument('status'), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
            $this->request->setArgument('status', $status);
        }

    }

    /**
     * action update hidden status
     * @param int $uid
     * @param ?bool $status
     * @return void
     */
    public function updateHiddenStatusAction(int $uid, ?bool $status)
    {
        $this->response->setHeader('Content-Type', 'application/json');
        if ($status === null) {
            return json_encode(['success' => false, 'message' => '"status" field empty.']);
        }
        $bicycle = $this->bicycleRepository->changeHiddenStatus($uid, $status);
        if (!$bicycle) {
            return json_encode(['success' => false, 'message' => 'error while updating hidden status.']);
        }
        return json_encode(['success' => true, 'message' => '', 'currentState' => $bicycle->getHidden()]);
    }
    /**s
     * @param ViewInterface $view
     */
    protected function initializeView(ViewInterface $view)
    {

        $this->pageRenderer->loadRequireJsModule('TYPO3/CMS/Pepebike/Datatables');

        $this->pageRenderer->addCssFile('EXT:pepebike/Resources/Public/Css/Datatables.css');
    }
}
