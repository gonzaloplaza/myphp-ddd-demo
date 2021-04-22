<?php declare(strict_types=1);

namespace Shared\Domain\Model;

use DateTimeImmutable;

interface DomainEvent
{
    public function id(): string;
    public function occurredOn(): DateTimeImmutable;
}