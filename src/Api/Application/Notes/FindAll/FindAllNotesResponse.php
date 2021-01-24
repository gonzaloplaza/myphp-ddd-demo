<?php declare(strict_types=1);

namespace Api\Application\Notes\FindAll;

use Api\Domain\Model\Note\NotesCollection;

final class FindAllNotesResponse
{
    private NotesCollection $notes;

    public function __construct(NotesCollection $notes)
    {
        $this->notes = $notes;
    }

    public static function create(NotesCollection $notes): self
    {
        return new self($notes);
    }

    public function notes(): NotesCollection
    {
        return $this->notes;
    }
}