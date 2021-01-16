<?php declare(strict_types=1);

namespace Tests\Shared\Infrastructure\Symfony\UuidGenerator;

use Tests\Shared\Infrastructure\PHPUnit\InfrastructureTestCase;
use Shared\Domain\UuidGenerator;

final class SymfonyUuidGeneratorTest extends InfrastructureTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_should_generate_new_random_uuid_string(): void
    {
        $symfonyUuidGenerator = $this->service(UuidGenerator::class);
        $uuid = $symfonyUuidGenerator->generate();

        $this->assertIsString($uuid);
        $this->assertRegExp("/^[a-f\d]{8}(-[a-f\d]{4}){4}[a-f\d]{8}$/i" , $uuid);
    }
}