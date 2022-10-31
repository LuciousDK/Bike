<?php

namespace Luat\PepeBike\ViewHelpers\Widget;

use Luat\PepeBike\ViewHelpers\Widget\Controller\FilterController;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetViewHelper;

class FilterViewHelper extends AbstractWidgetViewHelper
{
    /**
     * @var FilterController
     */
    protected $controller;

    /**
     * @param FilterController $controller
     */
    public function injectFilterController(FilterController $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Initialize arguments.
     *
     * @throws \TYPO3Fluid\Fluid\Core\ViewHelper\Exception
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('objects', 'mixed', 'Object', true);

        $defaultConfig = [
            'type' => 'brand',
            'value' => null
        ];
        $this->registerArgument('configuration', 'array', 'configuration', false, $defaultConfig);
    }

    /**
     * @return string
     * @throws \UnexpectedValueException
     */
    public function render()
    {
        $objects = $this->arguments['objects'];

        if (!($objects instanceof QueryResultInterface || $objects instanceof ObjectStorage || is_array($objects))) {
            throw new \UnexpectedValueException('Supplied file object type ' . get_class($objects) . ' must be QueryResultInterface or ObjectStorage or be an array.', 1454510731);
        }
        return $this->initiateSubRequest();
    }
}
