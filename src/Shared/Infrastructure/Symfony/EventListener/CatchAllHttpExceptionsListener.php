<?php declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

final class CatchAllHttpExceptionsListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $errorCode = (!empty($exception->getCode()))
            ? $exception->getCode()
            : JsonResponse::HTTP_INTERNAL_SERVER_ERROR;

        $event->setResponse(new JsonResponse(
            [
                'code' => $errorCode,
                'error' => $exception->getMessage(),
            ],
            $errorCode
        ));
    }
}