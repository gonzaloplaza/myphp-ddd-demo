<?php declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\Controller;

use Shared\Application\HealthCheck\ObtainHealthCheckService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class HealthCheckGetController extends AbstractApiController
{
    public function __invoke(Request $request, ObtainHealthCheckService $service): JsonResponse
    {
        $this->logger->debug('Calling healthCheck endpoint...');

        return JsonResponse::fromJsonString(
            $this->serializeResponse($service->__invoke())
        );
    }
}
