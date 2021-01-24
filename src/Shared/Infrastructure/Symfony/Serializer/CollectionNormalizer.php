<?php declare(strict_types=1);

namespace Shared\Infrastructure\Symfony\Serializer;

use Shared\Domain\Model\Collection;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

final class CollectionNormalizer implements ContextAwareNormalizerInterface
{
    public function supportsNormalization($data, string $format = null, array $context = [])
    {
        return $data instanceof Collection;
    }

    public function normalize($object, string $format = null, array $context = [])
    {
        return $object->items();
    }
}