<?php declare(strict_types=1);

namespace Tests\Api\Application\Notes;

use Api\Application\Notes\FindById\FindNoteById;
use Api\Application\Notes\FindById\FindNoteByIdRequest;
use Api\Domain\Model\Note\NoteNotFoundException;
use Tests\Api\ApiUnitTestCase;

final class FindNoteByIdTest extends ApiUnitTestCase
{
    /** @test */
    public function it_should_return_a_note_not_found_exception(): void
    {
        $findNoteById = new FindNoteById($this->noteRepository());

        $this->expectException(NoteNotFoundException::class);

        $findNoteById->__invoke(
            FindNoteByIdRequest::create('bf6126ef-52de-44bd-8fe1-297df15259b9')
        );
    }
}