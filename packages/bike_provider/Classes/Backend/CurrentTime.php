<?php
namespace Luat\BikeProvider\Backend;

use IntlDateFormatter;
use Locale;
use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class CurrentTime
{
    /**
     * Output the current time in red letters
     *
     * @param  string          Empty string (no content to process)
     * @param  array           TypoScript configuration
     * @return string          HTML output, showing the current server time.
     */
    public function printTime(string $content, array $conf): string
    {

        $context = GeneralUtility::makeInstance(Context::class);

        /** @var TYPO3\CMS\Core\Site\Entity\Site */
        $site = $GLOBALS['TYPO3_REQUEST']->getAttribute('site');
        $langId = $context->getPropertyFromAspect('language', 'id');

        /** @var TYPO3\CMS\Core\Site\Entity\SiteLanguage */
        $language = $site->getLanguageById($langId);
        $langCode = $language->getLocale();
        
        $formatter = new IntlDateFormatter($langCode, IntlDateFormatter::FULL, IntlDateFormatter::NONE);
        return $formatter->format(time());
    }
}
