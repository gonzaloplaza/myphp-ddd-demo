<?php declare(strict_types=1);

namespace Api\Application\Notes\FindById;

use Api\Domain\Model\Note\Note;

final class FindNoteByIdResponse
{
    private Note $note;

    public function __construct(Note $note)
    {
        $this->note = $note;
    }

    public static function create(Note $note): self
    {
        return new self($note);
    }

    public function note(): Note
    {
        return $this->note;
    }
}