<?php declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

final class MethodNotAllowedHttpExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        if (!($exception instanceof MethodNotAllowedHttpException)) {
            return;
        }

        $errorCode = JsonResponse::HTTP_METHOD_NOT_ALLOWED;

        $event->setResponse(new JsonResponse(
            [
                'code' => $errorCode,
                'error' => $exception->getMessage(),
            ],
            $errorCode
        ));
    }
}