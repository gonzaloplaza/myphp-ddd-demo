<?php declare(strict_types=1);

namespace Api\Infrastructure\Symfony\Controller\Notes;

use Api\Application\Notes\Create\CreateNote;
use Api\Application\Notes\Create\CreateNoteRequest;
use Shared\Infrastructure\Symfony\Controller\AbstractApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class NotesPostController extends AbstractApiController
{
    public function __invoke(Request $request, CreateNote $service): JsonResponse
    {
        return JsonResponse::fromJsonString(
            $this->serializeResponse(
                $service->__invoke(CreateNoteRequest::create(
                    $request->get('title'),
                    $request->get('content')
                ))),
            JsonResponse::HTTP_OK
        );
    }
}