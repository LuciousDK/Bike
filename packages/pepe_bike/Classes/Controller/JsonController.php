<?php

declare (strict_types = 1);

namespace Luat\PepeBike\Controller;

use Luat\PepeBike\Domain\Model\Bicycle;
use Luat\PepeBike\Domain\Repository\BicycleRepository;
use Luat\PepeBike\Domain\Repository\BrandRepository;
use Luat\PepeBike\Domain\Repository\ClientRepository;
use Luat\PepeBike\Mvc\View\JsonView;
use TYPO3\CMS\Extbase\Property\PropertyMapper;
use TYPO3\CMS\Extbase\Property\PropertyMappingConfigurationBuilder;

// use \TYPO3\CMS\Extbase\Mvc\View\JsonView;

/**
 * JsonController
 */
class JsonController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController

{
    /**
     * @var JsonView
     */
    protected $view;

    /**
     * @var string
     */
    protected $defaultViewObjectName = JsonView::class;

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
     * action list
     *
     * @return void
     */
    public function listAction()
    {

        if (!$this->request->hasArgument('object')) {

            $bicycles = $this->bicycleRepository->findAll();

            $brands = $this->brandRepository->findAll();

            $clients = $this->clientRepository->findAll();
            $this->view->assign('bicycles', $bicycles);
            $this->view->assign('brands', $brands);
            $this->view->assign('clients', $clients);
            $this->view->setVariablesToRender(['bicycles', 'brands', 'clients']);

            return;
        }
        switch ($this->request->getArgument('object')) {
            case 'bicycle':
                if ($this->request->hasArgument('id')) {
                    $bicycle = $this->bicycleRepository->findByUid($this->request->getArgument('id'));

                    $this->view->assign('bicycle', $bicycle);
                    $this->view->setVariablesToRender(['bicycle']);

                    break;
                }
            case 'bicycles':
                $bicycles = $this->bicycleRepository->findAll();
                $this->view->assign('bicycles', $bicycles);

                $this->view->setVariablesToRender(['bicycles']);
                break;
            case 'brand':
                if ($this->request->hasArgument('id')) {
                    $brand = $this->brandRepository->findByUid($this->request->getArgument('id'));

                    $this->view->assign('brand', $brand);

                    $this->view->setVariablesToRender(['brand']);
                    break;
                }
            case 'brands':
                $brands = $this->brandRepository->findAll();
                $this->view->assign('brands', $brands);
                $this->view->setVariablesToRender(['brands']);

                break;
            case 'client':
                if ($this->request->hasArgument('id')) {
                    $client = $this->clientRepository->findByUid($this->request->getArgument('id'));

                    $this->view->assign('client', $client);
                    $this->view->setVariablesToRender(['client']);

                    break;
                }
            case 'clients':
                $clients = $this->clientRepository->findAll();
                $this->view->assign('clients', $clients);
                $this->view->setVariablesToRender(['clients']);

                break;
            default:
                $this->throwStatus(400, 'Bad Request', '');
                break;
        }
    }

}
