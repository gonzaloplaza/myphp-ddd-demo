<?php declare(strict_types=1);

namespace Shared\Domain\Model;

interface DomainEventSubscriber
{
    public function isSubscribedTo(DomainEvent $domainEvent): bool;

    public function handle(DomainEvent $domainEvent): void;
}