<?php declare(strict_types=1);

namespace Api\Domain\Model\Note;

use DateTimeImmutable;

final class Note
{
    private NoteId $id;
    private NoteTitle $title;
    private NoteContent $content;
    private NoteCreatedAt $createdAt;

    public function __construct(NoteId $id, NoteTitle $title, NoteContent $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = new NoteCreatedAt(new DateTimeImmutable());
    }

    public static function create(NoteId $id, NoteTitle $title, NoteContent $content): self
    {
        return new self($id, $title, $content);
    }

    public function id(): NoteId
    {
        return $this->id;
    }

    public function title(): NoteTitle
    {
        return $this->title;
    }

    public function content(): NoteContent
    {
        return $this->content;
    }

    public function createdAt(): NoteCreatedAt
    {
        return $this->createdAt;
    }
}