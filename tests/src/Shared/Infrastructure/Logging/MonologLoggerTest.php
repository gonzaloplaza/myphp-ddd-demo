<?php declare(strict_types=1);

namespace Tests\Shared\Infrastructure\Logging;

use ArgumentCountError;
use DateTimeImmutable;
use Shared\Domain\Logger;
use Tests\Shared\Infrastructure\PHPUnit\InfrastructureTestCase;

final class MonologLoggerTest extends InfrastructureTestCase
{
    /** @test */
    public function it_should_return_an_exception(): void
    {
        $monologLogger = $this->service(Logger::class);

        $this->expectException(ArgumentCountError::class);
        $monologLogger->debug();
    }

    /** @test */
    public function it_should_register_a_log(): void
    {
        $monologLogger = $this->service(Logger::class);

        $this->assertNull($monologLogger->debug(sprintf(
            'Monolog tested at %s!',
            (new DateTimeImmutable('now'))->format('Y-m-d H:i:s')
        )));
    }
}