<?php declare(strict_types=1);

namespace Shared\Domain\ValueObject;

abstract class IntValueObject extends SerializableValueObject
{
    protected int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}