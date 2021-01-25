<?php declare(strict_types=1);

namespace Tests\Api\Infrastructure\Symfony\Console\Notes;

use Api\Application\Notes\Create\CreateNote;
use Api\Infrastructure\Symfony\Console\Notes\CreateNoteCommand;
use Symfony\Component\Console\Tester\CommandTester;
use Tests\Api\ApiUnitTestCase;

final class CreateNoteCommandTest extends ApiUnitTestCase
{
    /** @test  */
    public function it_should_return_new_create_note_response_with_id(): void
    {
        $createNote = new CreateNote($this->noteRepository());

        $this->application->add(new CreateNoteCommand($createNote));
        $command = $this->application->find('app:notes:create');
        $commandTester = new CommandTester($command);

        $commandTester->execute(['--title' => 'Test Title', '--content' => 'Test Content']);

        $this->assertJson($commandTester->getDisplay());

        $displayContent = json_decode($commandTester->getDisplay(), true);

        $this->assertIsString($displayContent['id']);
    }
}