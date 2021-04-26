<?php declare(strict_types=1);

namespace Api\Application\Notifications\Subscribe;

use Api\Domain\Model\Notification\NotificationCreatedEvent;
use Shared\Domain\Logger;
use Shared\Domain\Model\DomainEvent;
use Shared\Domain\Model\DomainEventSubscriber;

final class NotificationCreatedSubscriber implements DomainEventSubscriber
{
    private Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function isSubscribedTo(DomainEvent $domainEvent): bool
    {
        return ($domainEvent instanceof NotificationCreatedEvent);
    }

    public function handle(DomainEvent $domainEvent): void
    {
        $this->logger->debug(sprintf(
            'Notification Event handled with id %s and content %s !',
            /* @phpstan-ignore-next-line */
            $domainEvent->notification()->id(),
            /* @phpstan-ignore-next-line */
            $domainEvent->notification()->content()->value()
        ));
    }
}