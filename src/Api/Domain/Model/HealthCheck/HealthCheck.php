<?php declare(strict_types=1);

namespace Api\Domain\Model\HealthCheck;

final class HealthCheck
{
    private HealthCheckId $id;
    private bool $success;
    private int $timestamp;

    public function __construct(HealthCheckId $id, bool $success, int $timestamp)
    {
        $this->id = $id;
        $this->success = $success;
        $this->timestamp = $timestamp;
    }

    public static function create(HealthCheckId $id, bool $success, int $timestamp): self
    {
        return new self($id, $success, $timestamp);
    }

    public function id(): HealthCheckId
    {
        return $this->id;
    }

    public function success(): bool
    {
        return $this->success;
    }

    public function timestamp(): int
    {
        return $this->timestamp;
    }
}