<?php declare(strict_types=1);

namespace Tests\Api\Application\HealthCheck;

use Api\Application\HealthCheck\ObtainHealthCheck;
use Shared\Domain\UuidGenerator;
use Tests\Shared\Infrastructure\PHPUnit\UnitTestCase;

final class ObtainHealthCheckTest extends UnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_should_get_a_new_succeeded_healtcheck_response_object(): void
    {
        $uuidGenerator = $this->createMock(UuidGenerator::class);

        $obtainHealthCheck = new ObtainHealthCheck($uuidGenerator);

        $obtainHealthCheckResponse = $obtainHealthCheck->__invoke();

        $this->assertTrue($obtainHealthCheckResponse->success());
    }
}