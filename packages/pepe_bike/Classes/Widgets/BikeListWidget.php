<?php

declare(strict_types=1);

namespace Luat\PepeBike\Widgets;
use TYPO3\CMS\Core\Cache\Frontend\FrontendInterface as Cache;
use TYPO3\CMS\Fluid\View\StandaloneView;

class BikeListWidget implements \TYPO3\CMS\Dashboard\Widgets\WidgetInterface
{
    /**
     * @var WidgetConfigurationInterface
     */
    private $configuration;

    /**
     * @var array
     */
    private $options;

    /**
     * @var \TYPO3\CMS\Dashboard\Widgets\ButtonProviderInterface|null
     */
    private $buttonProvider;

    public function __construct(
        \TYPO3\CMS\Dashboard\Widgets\WidgetConfigurationInterface $configuration,
        Cache $cache,
        StandaloneView $view,
        $buttonProvider = null,
        array $options = []
    ) {
        $this->configuration = $configuration;
        $this->view = $view;
        $this->cache = $cache;
        $this->options = array_merge(
            [
                'limit' => 5,
                'lifeTime' => 43200
            ],
            $options
        );
        $this->buttonProvider = $buttonProvider;
    }

    public function renderWidgetContent(): string
    {
        $this->view->setTemplateRootPaths(['EXT:pepebike/Resources/Private/Templates']);
        $this->view->setTemplate('Widget/BikeListWidget');
        $this->view->assignMultiple([
            'items' => [1,2,3,4,5],
            'options' => $this->options,
            'button' => $this->buttonProvider,
            'configuration' => $this->configuration,
        ]);
        return $this->view->render();
    }

}
