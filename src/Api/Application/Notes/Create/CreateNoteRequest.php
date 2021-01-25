<?php declare(strict_types=1);

namespace Api\Application\Notes\Create;

use Api\Domain\Model\Note\NoteContent;
use Api\Domain\Model\Note\NoteTitle;
use Shared\Domain\Model\DomainRequest;

final class CreateNoteRequest implements DomainRequest
{
    private NoteTitle $title;
    private NoteContent $content;

    public function __construct(NoteTitle $title, NoteContent $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public static function create(NoteTitle $title, NoteContent $content): self
    {
        return new self($title, $content);
    }

    public static function fromRequest(string $title, string $content): self
    {
        return new self(new NoteTitle($title), new NoteContent($content));
    }

    public function title(): NoteTitle
    {
        return $this->title;
    }

    public function content(): NoteContent
    {
        return $this->content;
    }
}