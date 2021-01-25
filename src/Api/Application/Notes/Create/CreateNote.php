<?php declare(strict_types=1);

namespace Api\Application\Notes\Create;

use Api\Domain\Model\Note\Note;
use Api\Domain\Model\Note\NoteContent;
use Api\Domain\Model\Note\NoteException;
use Api\Domain\Model\Note\NoteRepository;

final class CreateNote
{
    private NoteRepository $noteRepository;

    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }

    public function __invoke(CreateNoteRequest $request): CreateNoteResponse
    {
        $note = Note::create(
            $this->noteRepository->nextId(),
            $request->title(),
            $request->content()
        );

        try {
            $this->noteRepository->save($note);
        } catch (\Exception $e) {
            throw new NoteException();
        }

        return CreateNoteResponse::create($note->id());
    }
}