<?php declare(strict_types=1);

namespace Shared\Domain\Model;

final class LoggerException extends DomainException
{
    public function __construct(string $message = "error.logger", int $code = 500)
    {
        parent::__construct($message, $code);
    }
}