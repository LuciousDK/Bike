<?php

declare (strict_types = 1);

namespace Luat\PepeBike\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Http\HtmlResponse;
class BicycleCrudController
{

    /**
     * @var BicycleRepository
     * @TYPO3\CMS\Extbase\Annotation\Inject
     */
    protected $bicycleRepository;

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface the response with the content
     */
    public function hideAction(ServerRequestInterface $request): ResponseInterface
    {
        return new HtmlResponse('pepe');
    }
}
