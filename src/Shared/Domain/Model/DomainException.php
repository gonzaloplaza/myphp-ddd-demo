<?php declare(strict_types=1);

namespace Shared\Domain\Model;

class DomainException extends \Exception
{
    private const DEFAULT_EXCEPTION_CODE = 400;

    public function __construct(string $message = "error.domainException", int $code = self::DEFAULT_EXCEPTION_CODE)
    {
        parent::__construct($message, $code);
    }
}