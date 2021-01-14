<?php declare(strict_types=1);

namespace Shared\Application\HealthCheck;

use Shared\Domain\Model\HealthCheck\HealthCheck;

final class ObtainHealthCheckResponse
{
    private HealthCheck $status;

    public function __construct(HealthCheck $status)
    {
        $this->status = $status;
    }

    public static function create(HealthCheck $status): self
    {
        return new self($status);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->status->id(),
            'success' => $this->status->success(),
            'timestamp' => $this->status->timestamp()
        ];

    }
}