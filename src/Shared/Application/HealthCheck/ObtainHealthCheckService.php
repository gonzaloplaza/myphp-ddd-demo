<?php declare(strict_types=1);

namespace Shared\Application\HealthCheck;

use DateTimeImmutable;
use Shared\Domain\Model\HealthCheck\HealthCheck;
use Shared\Domain\Model\HealthCheck\HealthCheckId;
use Shared\Domain\UuidGenerator;

final class ObtainHealthCheckService
{
    private UuidGenerator $uidGenerator;

    public function __construct(UuidGenerator $uidGenerator)
    {
        $this->uidGenerator = $uidGenerator;
    }

    public function __invoke(): ObtainHealthCheckResponse
    {
        return ObtainHealthCheckResponse::create(
            HealthCheck::create(
                HealthCheckId::create($this->uidGenerator::generate()),
                true,
                (new DateTimeImmutable())->getTimestamp()
            ));
    }
}