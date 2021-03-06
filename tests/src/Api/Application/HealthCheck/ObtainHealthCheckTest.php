<?php declare(strict_types=1);

namespace Tests\Api\Application\HealthCheck;

use Api\Application\HealthCheck\ObtainHealthCheck;
use Api\Application\HealthCheck\ObtainHealthCheckResponse;
use Api\Domain\Model\HealthCheck\HealthCheck;
use Tests\Api\ApiUnitTestCase;

final class ObtainHealthCheckTest extends ApiUnitTestCase
{
    /** @test */
    public function it_should_return_a_succeeded_healthcheck_response(): void
    {
        $obtainHealthCheck = new ObtainHealthCheck($this->uuidGenerator());

        $obtainHealthCheckResponse = $obtainHealthCheck->__invoke();

        $this->assertInstanceOf(ObtainHealthCheckResponse::class, $obtainHealthCheckResponse);

        $this->assertInstanceOf(HealthCheck::class, $obtainHealthCheckResponse->healthCheck());

        $this->assertTrue($obtainHealthCheckResponse->healthCheck()->success()->value());
    }
}