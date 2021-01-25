<?php declare(strict_types=1);

namespace Api\Application\Notes\FindById;

use Api\Domain\Model\Note\NoteId;

final class FindNoteByIdRequest
{
    private NoteId $id;

    public function __construct(NoteId $id)
    {
        $this->id = $id;
    }

    public static function create(NoteId $id): self
    {
        return new self($id);
    }

    public static function fromRequest(string $id): self
    {
        return new self(new NoteId($id));
    }

    public function id(): NoteId
    {
        return $this->id;
    }
}