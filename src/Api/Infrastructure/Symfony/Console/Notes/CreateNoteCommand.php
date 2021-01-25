<?php declare(strict_types=1);

namespace Api\Infrastructure\Symfony\Console\Notes;

use Api\Application\Notes\Create\CreateNote;
use Api\Application\Notes\Create\CreateNoteRequest;
use Api\Domain\Model\Note\NoteContent;
use Api\Domain\Model\Note\NoteTitle;
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
                'Note title'
            )
            ->addOption(
                'content',
                null,
                InputOption::VALUE_REQUIRED,
                'Note content'
            )
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $createNoteResponse = $this->createNote->__invoke(CreateNoteRequest::create(
            new NoteTitle($input->getOption('title')),
            new NoteContent($input->getOption('content'))
        ));

        $output->writeln(json_encode($createNoteResponse->toArray()));

        return Command::SUCCESS;
    }
}