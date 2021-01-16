<?php declare(strict_types=1);

namespace Api\Infrastructure\Symfony\Controller;

use Api\Application\HealthCheck\ObtainHealthCheck;
use Shared\Infrastructure\Symfony\Controller\AbstractApiController;
use Symfony\Component\HttpFoundation\JsonResponse;

final class HealthCheckGetController extends AbstractApiController
{
    public function __invoke(ObtainHealthCheck $service): JsonResponse
    {
        return JsonResponse::fromJsonString(
            $this->serializeResponse($service->__invoke())
        );
    }
}
