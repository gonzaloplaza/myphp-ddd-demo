<?php declare(strict_types=1);

namespace Shared\Domain\ValueObject;

abstract class DateTimeValueObject extends SerializableValueObject
{
    protected \DateTimeImmutable $value;

    public function __construct(\DateTimeImmutable $value)
    {
        $this->value = $value;
    }

    public function value(): \DateTimeImmutable
    {
        return $this->value;
    }
}