<?php declare(strict_types=1);

namespace Api\Infrastructure\Persistence\InMemory;

use Api\Domain\Model\Note\Note;
use Api\Domain\Model\Note\NoteId;
use Api\Domain\Model\Note\NoteRepository;
use Api\Domain\Model\Note\NotesCollection;
use Shared\Domain\UuidGenerator;

final class InMemoryNoteRepository implements NoteRepository
{
    private UuidGenerator $uuidGenerator;
    private static array $notes = [];

    public function __construct(UuidGenerator $uuidGenerator)
    {
        $this->uuidGenerator = $uuidGenerator;
    }

    public function all(): NotesCollection
    {
        return new NotesCollection(self::$notes);
    }

    public function nextId(): NoteId
    {
        return new NoteId($this->uuidGenerator->generate());
    }

    public function byId(NoteId $id): ?Note
    {
        if($this->isLoaded($id)) {
            return self::$notes[$id->value()];
        }

        return null;
    }

    public function save(Note $note): void
    {
        self::$notes[$note->id()->value()] = $note;
    }

    public function remove(Note $note): void
    {
        if($this->isLoaded($note->id())) {
            unset(self::$notes[$note->id()->value()]);
        }
    }

    private function isLoaded(NoteId $id): bool
    {
        if(isset(self::$notes[$id->value()])) {
            return true;
        }

        return false;
    }
}