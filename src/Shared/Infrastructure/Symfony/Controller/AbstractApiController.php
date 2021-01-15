<?php declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\Controller;

use Shared\Domain\Logger;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;

abstract class AbstractApiController
{
    private SerializerInterface $serializer;
    protected Logger $logger;

    public function __construct(SerializerInterface $serializer, Logger $logger)
    {
        $this->serializer = $serializer;
        $this->logger = $logger;
    }

    protected function serializeResponse(object $response): ?string
    {
        return $this->serializer->serialize($response, JsonEncoder::FORMAT);
    }
}
