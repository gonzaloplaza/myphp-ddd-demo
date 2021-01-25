<?php declare(strict_types=1);

namespace Api\Domain\Model\HealthCheck;

final class HealthCheck
{
    private HealthCheckId $id;
    private HealthCheckSuccess $success;
    private HealthCheckTimestamp $timestamp;

    public function __construct(HealthCheckId $id, HealthCheckSuccess $success, HealthCheckTimestamp $timestamp)
    {
        $this->id = $id;
        $this->success = $success;
        $this->timestamp = $timestamp;
    }

    public static function create(HealthCheckId $id, HealthCheckSuccess $success, HealthCheckTimestamp $timestamp): self
    {
        return new self($id, $success, $timestamp);
    }

    public function id(): HealthCheckId
    {
        return $this->id;
    }

    public function success(): HealthCheckSuccess
    {
        return $this->success;
    }

    public function timestamp(): HealthCheckTimestamp
    {
        return $this->timestamp;
    }
}