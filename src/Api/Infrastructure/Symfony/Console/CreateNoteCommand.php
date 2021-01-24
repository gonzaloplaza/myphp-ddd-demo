<?php declare(strict_types=1);

namespace Api\Infrastructure\Symfony\Console;

use Api\Application\Notes\Create\CreateNote;
use Api\Application\Notes\Create\CreateNoteRequest;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/*
 * Example: php bin/console app:notes:create --title="My Note" --content="This is note text"
 */
final class CreateNoteCommand extends Command
{
    protected static $defaultName = 'app:notes:create';

    private CreateNote $createNote;

    public function __construct(CreateNote $createNote)
    {
        parent::__construct(self::$defaultName);
        $this->createNote = $createNote;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Creates and get new cached note')
            ->setHelp('This command allows you to create a new note')
            ->addOption(
                'title',
                null,
                InputOption::VALUE_REQUIRED,
                'Title of the note'
            )
            ->addOption(
                'content',
                null,
                InputOption::VALUE_REQUIRED,
                'Text content of the note'
            )
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $createNoteResponse = $this->createNote->__invoke(CreateNoteRequest::create(
            $input->getOption('title'),
            $input->getOption('content')
        ));

        $output->writeln(sprintf(
            'Noted Created with id: %s',
            $createNoteResponse->id()->value()
        ));

        return Command::SUCCESS;
    }
}