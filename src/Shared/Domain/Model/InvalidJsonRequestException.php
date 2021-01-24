<?php declare(strict_types=1);

namespace Shared\Domain\Model;

final class InvalidJsonRequestException extends DomainException
{
    public function __construct(string $message = "error.invalidJsonRequest", int $code = 400)
    {
        parent::__construct($message, $code);
    }
}