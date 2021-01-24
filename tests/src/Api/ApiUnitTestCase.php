<?php declare(strict_types=1);

namespace Tests\Api;

use Api\Domain\Model\Note\NoteRepository;
use Shared\Domain\UuidGenerator;
use Tests\Shared\Infrastructure\PHPUnit\UnitTestCase;

abstract class ApiUnitTestCase extends UnitTestCase
{
    protected NoteRepository $noteRepository;
    protected UuidGenerator $uuidGenerator;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function noteRepository(): NoteRepository
    {
        return $this->noteRepository =
            $this->noteRepository ??
            $this->createMock(NoteRepository::class);
    }

    protected function uuidGenerator(): UuidGenerator
    {
        return $this->uuidGenerator =
            $this->uuidGenerator ??
            $this->createMock(UuidGenerator::class);
    }
}