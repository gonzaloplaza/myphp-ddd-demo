<?php declare(strict_types=1);

namespace Api\Domain\Model\Notification;

use Shared\Domain\Model\DomainException;

final class NotificationException extends DomainException
{
    public function __construct(string $message = "error.notificationException", int $code = 400)
    {
        parent::__construct($message, $code);
    }
}