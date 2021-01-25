<?php declare(strict_types=1);

namespace Api\Infrastructure\Symfony\Controller\Notes;

use Api\Application\Notes\FindById\FindNoteById;
use Api\Application\Notes\FindById\FindNoteByIdRequest;
use Shared\Infrastructure\Symfony\Controller\AbstractApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class NotesGetByIdController extends AbstractApiController
{
    public function __invoke(Request $request, FindNoteById $service): JsonResponse
    {
        return JsonResponse::fromJsonString(
            $this->serializeResponse($service->__invoke(
                FindNoteByIdRequest::fromRequest($request->get('id'))
            )->note()),
            JsonResponse::HTTP_OK
        );
    }
}