<?php declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\MessageBus;

use Shared\Domain\Model\DomainEvent;
use Shared\Domain\Model\DomainEventBus;
use Symfony\Component\Messenger\MessageBusInterface;

final class MessageBus implements DomainEventBus
{
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    public function publish(DomainEvent $event): void
    {
        $this->bus->dispatch($event, []);
    }
}