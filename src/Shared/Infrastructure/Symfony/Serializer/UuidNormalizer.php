<?php declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\Serializer;

use Shared\Domain\Model\Uuid;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

final class UuidNormalizer implements ContextAwareNormalizerInterface
{
    public function supportsNormalization($data, string $format = null, array $context = []): bool
    {
        return $data instanceof Uuid;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        return strval($object->value());
    }
}