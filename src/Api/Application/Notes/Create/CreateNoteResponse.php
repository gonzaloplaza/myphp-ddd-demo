<?php declare(strict_types=1);

namespace Api\Application\Notes\Create;

use Api\Domain\Model\Note\NoteId;

final class CreateNoteResponse
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

    public function id(): NoteId
    {
        return $this->id;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->value()
        ];
    }
}