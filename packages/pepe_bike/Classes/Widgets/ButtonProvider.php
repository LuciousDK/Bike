<?php

declare(strict_types=1);

namespace Luat\PepeBike\Widgets;

use TYPO3\CMS\Dashboard\Widgets\ButtonProviderInterface;

/**
 * Provides a button for the footer of a widget
 */
class ButtonProvider implements ButtonProviderInterface
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $target;

    /**
     * @var string
     */
    private $link;

    public function __construct(string $title, string $link, string $target = '')
    {
        $this->title = $title;
        $this->target = $target;
        $this->link = $link;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getTarget(): string
    {
        return $this->target;
    }
}
