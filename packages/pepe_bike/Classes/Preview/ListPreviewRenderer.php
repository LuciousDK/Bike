<?php
declare (strict_types = 1);
namespace Luat\PepeBike\Preview;

use Luat\PepeBike\Domain\Repository\BrandRepository;
use Luat\PepeBike\Domain\Repository\ClientRepository;
use TYPO3\CMS\Backend\View\BackendLayout\Grid\GridColumnItem;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Core\Service\FlexFormService;

class ListPreviewRenderer implements \TYPO3\CMS\Backend\Preview\PreviewRendererInterface

{
    /**
     * Flexform information
     *
     * @var array
     */
    public $flexformData = [];

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

        return '<strong>' . $record['header'] . '</strong>';
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
        $flexformService = GeneralUtility::makeInstance(FlexFormService::class);
        // $brandRepository = GeneralUtility::makeInstance(BrandRepository::class);
        // $clientRepository = GeneralUtility::makeInstance(ClientRepository::class);
        $this->flexformData = $flexformService->convertFlexFormContentToArray($item->getRecord()['pi_flexform']);
        // $brand = $brandRepository->findByUid($this->flexformData['settings']['brandFilter']);
        $record = $item->getRecord();
        $itemContent =
        '<div>
                <b>Plugin: </b>' . $record['list_type'] .
        '</div>
            <div>
                <b>Filters: </b>' . $this->flexformData['settings']['showFilters'] .
        '</div>
            <div>
                <b>Selected Brand: </b>' . $this->flexformData['settings']['brandFilter'] .
        '</div>
            <div>
                <b>Selected Clients: </b>' . $this->flexformData['settings']['clientFilter'] .
            '</div>
            <div>
                <b>Starting Point: </b>' . $record['pages'] .
            '</div>';
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
        return
            '<div>' .
            $previewHeader .
            '</div>' .
            '<div>' .
            $previewContent .
            '</div>';
    }

}
