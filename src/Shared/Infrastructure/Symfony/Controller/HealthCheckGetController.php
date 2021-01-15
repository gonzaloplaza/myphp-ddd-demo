<?php declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\Controller;

use Shared\Application\HealthCheck\ObtainHealthCheckService;
use Symfony\Component\HttpFoundation\JsonResponse;

final class HealthCheckGetController extends AbstractApiController
{
    public function __invoke(ObtainHealthCheckService $service): JsonResponse
    {
        return JsonResponse::fromJsonString(
            $this->serializeResponse($service->__invoke())
        );
    }
}
