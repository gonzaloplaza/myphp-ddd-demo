<?php declare(strict_types=1);

namespace Api\Domain\Model\Notification;

use DateTimeImmutable;
use Shared\Domain\Model\DomainEvent;

final class NotificationCreatedEvent implements DomainEvent
{
    private string $id;
    private Notification $notification;
    private DateTimeImmutable $ocurredOn;

    public function __construct(string $id, Notification $notification, DateTimeImmutable $ocurredOn)
    {
        $this->id = $id;
        $this->notification = $notification;
        $this->ocurredOn = $ocurredOn;
    }

    public static function create(string $id, Notification $notification, DateTimeImmutable $ocurredOn): self
    {
        return new self($id, $notification, $ocurredOn);
    }

    public function id(): string
    {
        return $this->id;
    }

    public function notification(): Notification
    {
        return $this->notification;
    }

    public function occurredOn(): DateTimeImmutable
    {
        return $this->ocurredOn;
    }
}