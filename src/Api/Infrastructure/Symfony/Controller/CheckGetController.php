<?php declare(strict_types=1);

namespace Api\Infrastructure\Symfony\Controller;

use Shared\Infrastructure\Symfony\Controller\AbstractApiController;
use Symfony\Component\HttpFoundation\JsonResponse;

final class CheckGetController extends AbstractApiController
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse(null, JsonResponse::HTTP_OK);
    }
}