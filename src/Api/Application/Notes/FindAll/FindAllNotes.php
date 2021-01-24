<?php declare(strict_types=1);

namespace Api\Application\Notes\FindAll;

use Api\Domain\Model\Note\NoteRepository;

final class FindAllNotes
{
    private NoteRepository $noteRepository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    public function __invoke(): FindAllNotesResponse
    {
        $notes = $this->noteRepository->all();

        return FindAllNotesResponse::create($notes);
    }
}