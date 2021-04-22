<?php declare(strict_types=1);

namespace Api\Application\Notifications\Send;

use Api\Domain\Model\Notification\NotificationContent;

final class SendNotificationRequest
{
    private NotificationContent $content;

    public function __construct(NotificationContent $content)
    {
        $this->content = $content;
    }

    public static function create(NotificationContent $content): self
    {
        return new self($content);
    }

    public function content(): NotificationContent
    {
        return $this->content;
    }
}