<?php
declare (strict_types = 1);
namespace Luat\BikeProvider\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RandomImageSourceGenerator implements MiddlewareInterface
{
    private const API = 'https://picsum.photos';

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        if (is_array($request->getParsedBody()["data"]["tt_content"])) {
            $parsedBody = $request->getParsedBody();

            foreach ($parsedBody["data"]["tt_content"] as $key => $element) {

                // Get Source Url Through API Call
                // $sourceUrl = $this->getRedirectUrl($this::API . '/' . $element['tx_bikeprovider_width'] . '/' . $element['tx_bikeprovider_height']);


                // Get Source Url with random image id;
                // Lorem Picsum has up to 1084 ids.
                $imageId = rand(1, 1084);
                $sourceUrl = $this::API . '/id/' . $imageId . '/' . $element['tx_bikeprovider_width'] . '/' . $element['tx_bikeprovider_height'];


                $parsedBody["data"]["tt_content"][$key]['tx_bikeprovider_generatedurl'] = $sourceUrl;

            }

            $request = $request->withParsedBody($parsedBody);

        }
        return $handler->handle($request);
    }

    /**
     * Gets the url a request would return.
     *
     * @param  string  $originUrl
     *
     * @return  ?string
     */
    private function getRedirectUrl(string $originUrl): ?string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $originUrl);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_exec($ch);
        $location = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

        curl_close($ch);
        return $location;
    }
}
