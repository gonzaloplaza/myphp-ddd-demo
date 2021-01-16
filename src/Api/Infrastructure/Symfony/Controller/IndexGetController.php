<?php declare(strict_types=1);

namespace Api\Infrastructure\Symfony\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

final class IndexGetController
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse(null, JsonResponse::HTTP_OK);
    }
}
