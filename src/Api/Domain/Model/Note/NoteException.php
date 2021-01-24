<?php declare(strict_types=1);

namespace Api\Domain\Model\Note;

use Shared\Domain\Model\DomainException;

final class NoteException extends DomainException
{
    public function __construct(string $message = "error.note", int $code = 400)
    {
        parent::__construct($message, $code);
    }
}