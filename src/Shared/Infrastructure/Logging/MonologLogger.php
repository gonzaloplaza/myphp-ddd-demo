<?php declare(strict_types=1);

namespace Shared\Infrastructure\Logging;

use Psr\Log\LoggerInterface;
use Shared\Domain\Logger;

final class MonologLogger implements Logger
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function add(string $level, string $message, array $context = []): void
    {
        $this->logger->$level($message, $context);
    }

    public function debug(string $message): void
    {
        $this->logger->debug($message);
    }

    public function info(string $message): void
    {
        $this->logger->info($message);
    }

    public function warning(string $message): void
    {
        $this->logger->warning($message);
    }

    public function error(string $message): void
    {
        $this->logger->error($message);
    }

    public function critical(string $message): void
    {
        $this->logger->critical($message);
    }
}