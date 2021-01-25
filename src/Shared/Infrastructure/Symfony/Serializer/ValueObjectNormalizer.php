<?php declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\Serializer;

use Shared\Domain\ValueObject\SerializableValueObject;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

final class ValueObjectNormalizer implements ContextAwareNormalizerInterface
{
    public function supportsNormalization($data, string $format = null, array $context = [])
    {
        return $data instanceof SerializableValueObject;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        return $object->value();
    }
}