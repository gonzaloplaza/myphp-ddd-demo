<?php declare(strict_types=1);

namespace Api\Domain\Model\Notification;

use DateTimeImmutable;

final class Notification
{
    private NotificationId $id;
    private NotificationContent $content;
    private NotificationCreatedAt $createdAt;

    public function __construct(NotificationId $id, NotificationContent $content)
    {
        $this->id = $id;
        $this->content = $content;
        $this->createdAt = new NotificationCreatedAt(new DateTimeImmutable());
    }

    public static function create(NotificationId $id, NotificationContent $content): self
    {
        return new self($id, $content);
    }

    public function id(): NotificationId
    {
        return $this->id;
    }

    public function content(): NotificationContent
    {
        return $this->content;
    }

    public function createdAt(): NotificationCreatedAt
    {
        return $this->createdAt;
    }
}