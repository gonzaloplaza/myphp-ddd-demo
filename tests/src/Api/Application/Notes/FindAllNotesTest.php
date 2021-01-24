<?php declare(strict_types=1);

namespace Tests\Api\Application\Notes;

use Api\Application\Notes\FindAll\FindAllNotes;
use Api\Application\Notes\FindAll\FindAllNotesResponse;
use Api\Domain\Model\Note\NotesCollection;
use Tests\Api\ApiUnitTestCase;

final class FindAllNotesTest extends ApiUnitTestCase
{
    /** @test */
    public function it_should_return_a_notes_collection(): void
    {
        $findAllNotes = new FindAllNotes($this->noteRepository());

        $findAllNotesResponse = $findAllNotes->__invoke();

        $this->assertInstanceOf(FindAllNotesResponse::class, $findAllNotesResponse);

        $this->assertInstanceOf(NotesCollection::class, $findAllNotesResponse->notes());
    }
}