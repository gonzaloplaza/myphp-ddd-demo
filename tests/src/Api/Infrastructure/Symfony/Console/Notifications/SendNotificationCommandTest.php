<?php declare(strict_types=1);

namespace Tests\Api\Infrastructure\Symfony\Console\Notifications;

use Api\Application\Notifications\Send\SendNotification;
use Api\Domain\Model\Notification\NotificationException;
use Api\Infrastructure\Symfony\Console\Notifications\SendNotificationCommand;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\Api\ApiUnitTestCase;

final class SendNotificationCommandTest extends ApiUnitTestCase
{
    /** @test  */
    public function it_should_throw_a_notification_exception(): void
    {
        $sendNotification = new SendNotification($this->uuidGenerator(), $this->bus());

        $this->expectException(NotificationException::class);

        $this->application->add(new SendNotificationCommand($sendNotification));
        $command = $this->application->find('app:notification:send');
        $commandTester = new CommandTester($command);

        $commandTester->execute([]);
    }
}