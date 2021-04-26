<?php declare(strict_types=1);

namespace Api\Application\Notifications\Send;

use Api\Domain\Model\Notification\Notification;
use Api\Domain\Model\Notification\NotificationCreatedEvent;
use Api\Domain\Model\Notification\NotificationId;
use DateTimeImmutable;
use Shared\Domain\Model\DomainEventBus;
use Shared\Domain\UuidGenerator;

final class SendNotification
{
    private UuidGenerator $uuidGenerator;
    private DomainEventBus $bus;

    public function __construct(UuidGenerator $uuidGenerator, DomainEventBus $bus)
    {
        $this->uuidGenerator = $uuidGenerator;
        $this->bus = $bus;
    }

    public function __invoke(SendNotificationRequest $request): SendNotificationResponse
    {
        $notification = Notification::create(
            new NotificationId($this->uuidGenerator->generate()),
            $request->content()
        );

        $this->bus->publish(NotificationCreatedEvent::create(
            $this->uuidGenerator->generate(),
            $notification,
            new DateTimeImmutable()
        ));

        return SendNotificationResponse::create($notification->id());
    }
}