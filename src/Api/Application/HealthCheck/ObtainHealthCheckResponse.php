<?php declare(strict_types=1);

namespace Api\Application\HealthCheck;

use Api\Domain\Model\HealthCheck\HealthCheck;

final class ObtainHealthCheckResponse
{
    private string $id;
    private bool $success;
    private int $timestamp;

    public function __construct(string $id, bool $success, int $timestamp)
    {
        $this->id = $id;
        $this->success = $success;
        $this->timestamp = $timestamp;
    }

    public static function create(HealthCheck $healthCheck): self
    {
        return new self(
            $healthCheck->id()->value(),
            $healthCheck->success(),
            $healthCheck->timestamp()
        );
    }

    public function success(): bool
    {
        return $this->success;
    }
}