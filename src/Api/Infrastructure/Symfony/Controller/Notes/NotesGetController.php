<?php declare(strict_types=1);

namespace Api\Infrastructure\Symfony\Controller\Notes;

use Api\Application\Notes\FindAll\FindAllNotes;
use Shared\Infrastructure\Symfony\Controller\AbstractApiController;
use Symfony\Component\HttpFoundation\JsonResponse;

final class NotesGetController extends AbstractApiController
{
    public function __invoke(FindAllNotes $service): JsonResponse
    {
        return JsonResponse::fromJsonString(
            $this->serializeResponse($service->__invoke()->notes()),
            JsonResponse::HTTP_OK
        );
    }
}