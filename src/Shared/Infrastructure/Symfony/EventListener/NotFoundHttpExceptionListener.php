<?php declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class NotFoundHttpExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        if (!($exception instanceof NotFoundHttpException)) {
            return;
        }

        $errorCode = JsonResponse::HTTP_NOT_FOUND;

        $event->setResponse(new JsonResponse(
            [
                'code' => $errorCode,
                'error' => $exception->getMessage(),
            ],
            $errorCode
        ));
    }
}
