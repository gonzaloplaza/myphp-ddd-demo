<?php

namespace Api\Domain\Model\Note;

interface NoteRepository
{
    public function all(): NotesCollection;
    public function nextId(): NoteId;
    public function byId(NoteId $id): ?Note;
    public function save(Note $note): void;
    public function remove(Note $note): void;
}