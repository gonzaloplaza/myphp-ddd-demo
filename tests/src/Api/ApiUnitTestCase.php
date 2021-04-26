<?php declare(strict_types=1);

namespace Tests\Api;

use Api\Domain\Model\Note\NoteRepository;
use Shared\Domain\Model\DomainEventBus;
use Shared\Domain\UuidGenerator;
use Symfony\Component\Console\Application;
use Tests\Shared\Infrastructure\PHPUnit\UnitTestCase;

abstract class ApiUnitTestCase extends UnitTestCase
{
    protected Application $application;
    protected NoteRepository $noteRepository;
    protected UuidGenerator $uuidGenerator;
    protected DomainEventBus $bus;

    protected function setUp(): void
    {
        parent::setUp();
        $this->application = new Application();
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

    protected function bus(): DomainEventBus
    {
        return $this->bus =
            $this->bus ??
            $this->createMock(DomainEventBus::class);
    }
}