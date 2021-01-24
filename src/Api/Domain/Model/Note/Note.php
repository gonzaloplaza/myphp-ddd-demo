<?php declare(strict_types=1);

namespace Api\Domain\Model\Note;

use DateTimeImmutable;

final class Note
{
    private NoteId $id;
    private NoteContent $content;
    private DateTimeImmutable $createdAt;

    public function __construct(NoteId $id, NoteContent $content)
    {
        $this->id = $id;
        $this->content = $content;
        $this->createdAt = new DateTimeImmutable();
    }

    public static function create(NoteId $id, NoteContent $content): self
    {
        return new self($id, $content);
    }

    public function id(): NoteId
    {
        return $this->id;
    }

    public function content(): NoteContent
    {
        return $this->content;
    }

    public function createdAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}