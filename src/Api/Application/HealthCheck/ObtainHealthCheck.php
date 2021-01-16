<?php declare(strict_types=1);

namespace Api\Application\HealthCheck;

use DateTimeImmutable;
use Api\Domain\Model\HealthCheck\HealthCheck;
use Api\Domain\Model\HealthCheck\HealthCheckId;
use Shared\Domain\UuidGenerator;

final class ObtainHealthCheck
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
                HealthCheckId::create($this->uidGenerator->generate()),
                true,
                (new DateTimeImmutable())->getTimestamp()
            ));
    }
}