<?php
declare (strict_types = 1);
namespace Luat\BikeProvider\Preview;

use TYPO3\CMS\Backend\View\BackendLayout\Grid\GridColumnItem;

class RandomImageFluidPreviewRenderer implements \TYPO3\CMS\Backend\Preview\PreviewRendererInterface

{
    /**
     * Dedicated method for rendering preview header HTML for
     * the page module only. Receives $item which is an instance of
     * GridColumnItem which has a getter method to return the record.
     *
     * @param GridColumnItem
     * @return string
     */
    public function renderPageModulePreviewHeader(GridColumnItem $item): string
    {
        $record = $item->getRecord();

        return 'header';
    }

    /**
     * Dedicated method for rendering preview body HTML for
     * the page module only.
     *
     * @param GridColumnItem $item
     * @return string
     */
    public function renderPageModulePreviewContent(GridColumnItem $item): string
    {
        $record = $item->getRecord();
        $itemContent = '';
        if ($record['tx_bikeprovider_generatedurl']) {
            $itemContent .= '
            <div style="display:flex">
                <div style="flex: 0 1 auto; padding-right:20px">
                    <img style="height:200px" src="' . $record['tx_bikeprovider_generatedurl'] . '"/>
                </div>
                <div style="flex: 0 0 10%">
                    Height: ' . $record['tx_bikeprovider_height'] . '
                    Width: ' . $record['tx_bikeprovider_width'] . '
                </div>
            </div>';
        }
        return $itemContent;

    }

    /**
     * Render a footer for the record to display in page module below
     * the body of the item's preview.
     *
     * @param GridColumnItem $item
     * @return string
     */
    public function renderPageModulePreviewFooter(GridColumnItem $item): string
    {
        return 'footer';
    }

    /**
     * Dedicated method for wrapping a preview header and body HTML.
     *
     * @param string $previewHeader
     * @param string $previewContent
     * @param GridColumnItem $item
     * @return string
     */
    public function wrapPageModulePreview($previewHeader, $previewContent, GridColumnItem $item): string
    {

        return $previewContent;
    }
}
