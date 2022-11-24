<?php

namespace Luat\BikeProvider\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class ValueInArrayViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;
    protected $escapeOutput = false;
    public function initializeArguments()
    {
        $this->registerArgument('value', 'string', '', true);
        $this->registerArgument('array', 'array', '', true);
        $this->registerArgument('strict', 'boolean', '', false, false);
    }

    public static function renderStatic(
        array $arguments,
        \Closure$renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        return in_array($arguments['value'], $arguments['array']);
    }
}
