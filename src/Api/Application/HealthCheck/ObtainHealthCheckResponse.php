<?php declare(strict_types=1);

namespace Api\Application\HealthCheck;

use Api\Domain\Model\HealthCheck\HealthCheck;

final class ObtainHealthCheckResponse
{
    private HealthCheck $healthCheck;

    public function __construct(HealthCheck $healthCheck)
    {
        $this->healthCheck = $healthCheck;
    }

    public static function create(HealthCheck $healthCheck): self
    {
        return new self($healthCheck);
    }

    public function healthCheck(): HealthCheck
    {
        return $this->healthCheck;
    }
}