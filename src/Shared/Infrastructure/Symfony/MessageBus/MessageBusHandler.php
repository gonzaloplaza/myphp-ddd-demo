<?php declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\MessageBus;

use ReflectionClass;
use Shared\Domain\Logger;
use Shared\Domain\Model\DomainEvent;
use Shared\Domain\Model\DomainEventSubscriber;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class MessageBusHandler implements MessageHandlerInterface
{
    private Logger $logger;
    private array $subscribers;

    public function __construct(Logger $logger)
    {
        $this->subscribers = [];
        $this->logger = $logger;
    }

    public function __invoke(DomainEvent $domainEvent): void
    {
        /** @var DomainEventSubscriber $domainSubscriber */
        foreach ($this->subscribers as $domainSubscriber) {

            if ($domainSubscriber->isSubscribedTo($domainEvent)) {
                $this->logger->debug(sprintf(
                    'Handling event %s with id: %s',
                    (new ReflectionClass($domainEvent))->getShortName(),
                    $domainEvent->id()
                ));
                $domainSubscriber->handle($domainEvent);
            }
        }
    }

    public function registerAll(array $domainEventSubscribers): void
    {
        foreach ($domainEventSubscribers as $domainEventSubscriber) {
            $this->register($domainEventSubscriber);
        }
    }

    public function register(DomainEventSubscriber $domainEventSubscriber): void
    {
        $this->subscribers[] = $domainEventSubscriber;
    }

}