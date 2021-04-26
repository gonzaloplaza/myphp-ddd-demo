<?php declare(strict_types=1);

namespace Api\Application\Notifications\Send;

use Api\Domain\Model\Notification\NotificationId;

final class SendNotificationResponse
{
    private NotificationId $id;

    public function __construct(NotificationId $id)
    {
        $this->id = $id;
    }

    public static function create(NotificationId $id): self
    {
        return new self($id);
    }

    public function id(): NotificationId
    {
        return $this->id;
    }
}