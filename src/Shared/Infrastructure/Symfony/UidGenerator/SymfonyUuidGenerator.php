<?php declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\UidGenerator;

use Shared\Domain\UuidGenerator;
use Symfony\Component\Uid\Uuid;

final class SymfonyUuidGenerator implements UuidGenerator
{
    public function generate(): string
    {
        return strval(Uuid::v4());
    }
}