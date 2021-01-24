<?php declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\EventListener;

use Shared\Domain\Model\DomainException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

final class DomainExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        if (!($exception instanceof DomainException)) {
            return;
        }

        //Default Domain Exception errorCode
        $errorCode = $exception->getCode() ?? JsonResponse::HTTP_BAD_REQUEST;

        $event->setResponse(new JsonResponse(
            [
                'code' => $errorCode,
                'error' => $exception->getMessage(),
            ],
            $errorCode
        ));
    }
}


