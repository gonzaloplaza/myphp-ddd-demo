<?php declare(strict_types=1);

namespace Api\Application\Notes\FindById;

final class FindNoteByIdRequest
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public static function create(string $id): self
    {
        return new self($id);
    }

    public function id(): string
    {
        return $this->id;
    }
}