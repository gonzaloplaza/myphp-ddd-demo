<?php declare(strict_types=1);

namespace Api\Application\Notes\Create;

use Shared\Domain\Model\DomainRequest;

final class CreateNoteRequest implements DomainRequest
{
    private string $title;
    private string $content;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    public static function create(string $title, string $content): self
    {
        return new self($title, $content);
    }

    public function title(): string
    {
        return $this->title;
    }

    public function content(): string
    {
        return $this->content;
    }
}