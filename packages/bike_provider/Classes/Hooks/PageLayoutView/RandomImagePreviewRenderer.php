<?php
declare (strict_types = 1);
namespace Luat\BikeProvider\Hooks\PageLayoutView;

use TYPO3\CMS\Backend\View\PageLayoutView;
use TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface;

class RandomImagePreviewRenderer implements PageLayoutViewDrawItemHookInterface
{
    /**
     * Preprocesses the preview rendering of a content element of type "bikeprovider_randomimage"
     *
     * @param \TYPO3\CMS\Backend\View\PageLayoutView $parentObject Calling parent object
     * @param bool $drawItem Whether to draw the item using the default functionality
     * @param string $headerContent Header content
     * @param string $itemContent Item content
     * @param array $row Record row of tt_content
     */
    public function preProcess(
        PageLayoutView &$parentObject,
        &$drawItem,
        &$headerContent,
        &$itemContent,
        array &$row
    ) {
        if ($row['CType'] === 'bikeprovider_randomimage') {
            if ($row['tx_bikeprovider_generatedurl']) {
                $itemContent .= '
                <div style="display:flex">
                    <div style="flex: 0 1 auto; padding-right:20px">
                        <img style="height:200px" src="' . $row['tx_bikeprovider_generatedurl'] . '"/>
                    </div>
                    <div style="flex: 0 0 10%">
                        Height: ' . $row['tx_bikeprovider_height'] . '
                        Width: ' . $row['tx_bikeprovider_width'] . '
                    </div>
                </div>';
            }

            $drawItem = false;
        }
    }
}
