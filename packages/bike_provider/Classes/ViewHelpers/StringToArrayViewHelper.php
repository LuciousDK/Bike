<?php

namespace Luat\BikeProvider\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class StringToArrayViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;
    protected $escapeOutput = false;
    public function initializeArguments()
    {
        $this->registerArgument('string', 'string', '', true);
        $this->registerArgument('as', 'string', '', false, 'array');
        $this->registerArgument('delimiter', 'string', '', false, ',');
    }

    public static function renderStatic(
        array $arguments,
        \Closure$renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        $array = explode(',', $arguments['string']);
        $variableProvider = $renderingContext->getVariableProvider();
        $variableProvider->add($arguments['as'], $array);
    }
}
