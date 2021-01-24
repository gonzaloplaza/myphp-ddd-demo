<?php declare(strict_types=1);

namespace Api\Application\Notes\Create;

use Api\Domain\Model\Note\NoteId;

final class CreateNoteResponse
{
    private NoteId $id;
    private \DateTimeImmutable $createdAt;

    public function __construct(NoteId $id, \DateTimeImmutable $createdAt)
    {
        $this->id = $id;
        $this->createdAt = $createdAt;
    }

    public static function create(NoteId $id, \DateTimeImmutable $createdAt): self
    {
        return new self($id, $createdAt);
    }

    public function id(): NoteId
    {
        return $this->id;
    }
}