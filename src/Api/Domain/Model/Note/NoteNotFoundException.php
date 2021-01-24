<?php declare(strict_types=1);

namespace Api\Domain\Model\Note;

use Shared\Domain\Model\DomainException;

final class NoteNotFoundException extends DomainException
{
    public function __construct(string $message = "error.noteNotFound")
    {
        parent::__construct($message, 404);
    }
}