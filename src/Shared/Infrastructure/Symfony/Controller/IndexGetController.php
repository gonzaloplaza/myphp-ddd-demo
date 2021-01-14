<?php declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class IndexGetController
{
    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse(null, JsonResponse::HTTP_OK);
    }
}
