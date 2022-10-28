<?php

namespace Luat\PepeBike\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class TestViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;
    protected $escapeOutput = false;
    public function initializeArguments()
    {
        $this->registerArgument('string', 'string', '');
    }

    public static function renderStatic(
        array $arguments,
        \Closure$renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        $variableProvider = $renderingContext->getVariableProvider();
        $variableProvider->add('strings', $arguments['string']);
    }
}
