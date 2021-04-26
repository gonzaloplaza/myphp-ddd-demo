<?php declare(strict_types=1);

namespace Tests\Api\Application\Notifications;

use Api\Application\Notifications\Send\SendNotification;
use Api\Application\Notifications\Send\SendNotificationRequest;
use Api\Application\Notifications\Send\SendNotificationResponse;
use Api\Domain\Model\Notification\NotificationId;
use Tests\Api\ApiUnitTestCase;

final class SendNotificationTest extends ApiUnitTestCase
{
    /** @test
     * @throws \Api\Domain\Model\Notification\NotificationException
     */
    public function it_should_return_a_send_notification_response_with_notification_id(): void
    {
        $sendNotification = new SendNotification($this->uuidGenerator(), $this->bus());

        $sendNotificationResponse = $sendNotification(
            SendNotificationRequest::fromRequest('Test Notification')
        );

        $this->assertInstanceOf(SendNotificationResponse::class, $sendNotificationResponse);

        $this->assertInstanceOf(NotificationId::class, $sendNotificationResponse->id());
    }

}