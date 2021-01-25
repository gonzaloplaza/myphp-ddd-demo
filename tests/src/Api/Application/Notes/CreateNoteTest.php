<?php declare(strict_types=1);

namespace Tests\Api\Application\Notes;

use Api\Application\Notes\Create\CreateNote;
use Api\Application\Notes\Create\CreateNoteRequest;
use Api\Application\Notes\Create\CreateNoteResponse;
use Api\Domain\Model\Note\NoteId;
use Tests\Api\ApiUnitTestCase;

final class CreateNoteTest extends ApiUnitTestCase
{
    /** @test */
    public function it_should_return_a_create_note_response_with_note_id(): void
    {
        $createNote = new CreateNote($this->noteRepository());

        $createNoteResponse = $createNote->__invoke(
            CreateNoteRequest::fromRequest('Demo Title', 'Demo Content')
        );

        $this->assertInstanceOf(CreateNoteResponse::class, $createNoteResponse);

        $this->assertInstanceOf(NoteId::class, $createNoteResponse->id());
    }
}