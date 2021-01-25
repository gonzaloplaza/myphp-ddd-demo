<?php declare(strict_types=1);

namespace Api\Application\Notes\FindById;

use Api\Domain\Model\Note\NoteNotFoundException;
use Api\Domain\Model\Note\NoteRepository;

final class FindNoteById
{
    private NoteRepository $noteRepository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    public function __invoke(FindNoteByIdRequest $request): FindNoteByIdResponse
    {
        $note = $this->noteRepository->byId($request->id());

        if(empty($note)) {
            throw new NoteNotFoundException();
        }

        return FindNoteByIdResponse::create($note);
    }
}