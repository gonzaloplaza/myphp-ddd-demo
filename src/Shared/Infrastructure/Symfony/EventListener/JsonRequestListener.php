<?php declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\EventListener;

use Shared\Domain\Model\InvalidJsonRequestException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

final class JsonRequestListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        $request         = $event->getRequest();
        $requestContents = $request->getContent();

        if (!empty($requestContents) &&
            $this->containsHeader($request, 'Content-Type', 'application/json')) {
            $jsonData = json_decode($requestContents, true);
            if (!$jsonData) {
                throw new InvalidJsonRequestException();
            }
            $jsonDataLowerCase = [];
            foreach ($jsonData as $key => $value) {
                $jsonDataLowerCase[preg_replace_callback(
                    '/_(.)/',
                    static function ($matches) {
                        return strtoupper($matches[1]);
                    },
                    $key
                )] = $value;
            }
            $request->request->replace($jsonDataLowerCase);
        }
    }

    private function containsHeader(Request $request, string $name, string $value): bool
    {
        return 0 === strpos($request->headers->get($name), $value);
    }
}