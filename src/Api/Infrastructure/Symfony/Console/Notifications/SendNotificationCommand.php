<?php declare(strict_types=1);

namespace Api\Infrastructure\Symfony\Console\Notifications;

use Api\Application\Notifications\Send\SendNotification;
use Api\Application\Notifications\Send\SendNotificationRequest;
use Api\Domain\Model\Notification\NotificationContent;
use Api\Domain\Model\Notification\NotificationException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class SendNotificationCommand extends Command
{
    protected static $defaultName = 'app:notification:send';

    private SendNotification $sendNotification;

    public function __construct(SendNotification $sendNotification)
    {
        parent::__construct(self::$defaultName);
        $this->sendNotification = $sendNotification;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Send new notification to the queue')
            ->setHelp('This command allows you to send a new notification to the queue')
            ->addOption(
                'content',
                null,
                InputOption::VALUE_REQUIRED,
                'Notification content'
            )
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $content = $input->getOption('content');

        if(empty($content)) {
            throw new NotificationException('Invalid arguments');
        }

        $sendNotificationResponse = $this->sendNotification->__invoke(SendNotificationRequest::create(new NotificationContent($content)));

        $output->writeln(sprintf(
            'Notification sent with id %s !',
            $sendNotificationResponse->id()
        ));

        return Command::SUCCESS;
    }
}