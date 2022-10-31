<?php


namespace Luat\PepeBike\ViewHelpers\Widget\Controller;

use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Fluid\Core\Widget\AbstractWidgetController;

/**
 * Class FilterController
 */
class FilterController extends AbstractWidgetController
{
    /**
     * @var array
     */
    protected $configuration = [
        'type' => 'brand',
        'value' => null
    ];

    /**
     * @var QueryResultInterface|ObjectStorage|array
     */
    protected $objects;

    
    /**
     * Initializes the current information on which page the visitor is.
     */
    public function initializeAction()
    {
        $this->objects = $this->widgetConfiguration['objects'];
        ArrayUtility::mergeRecursiveWithOverrule($this->configuration, $this->widgetConfiguration['configuration'], false);

    }

    public function indexAction()
    {
        $this->view->assign('configuration', $this->configuration);
    }

}
