<?php declare(strict_types=1);

namespace Tests\Shared\Infrastructure\PHPUnit;

use Shared\Infrastructure\Symfony\Kernel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

abstract class InfrastructureTestCase extends KernelTestCase
{
    protected function setUp(): void
    {
        self::bootKernel([
            'environment' => 'test'
        ]);

        parent::setUp();
    }

    protected static function getKernelClass(): string
    {
        return Kernel::class;
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    protected function service(string $id): object
    {
        return self::$container->get($id);
    }
}