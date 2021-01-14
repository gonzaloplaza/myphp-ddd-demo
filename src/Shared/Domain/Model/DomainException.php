<?php declare(strict_types=1);

namespace Shared\Domain\Model;

class DomainException extends \Exception
{
    public function __construct(string $message = "error.domainException", int $code = 400)
    {
        parent::__construct($message, $code);
    }
}