<?php declare(strict_types=1);

namespace Shared\Domain\Model;

interface DomainEventBus
{
    public function publish(DomainEvent $event): void;
}