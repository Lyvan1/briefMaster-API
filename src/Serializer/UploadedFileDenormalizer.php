<?php

namespace App\Serializer;

use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class UploadedFileDenormalizer implements DenormalizerInterface
{

    /**
     * @inheritDoc
     */
    public function denormalize($data, string $type, string $format = null, array $context = []): mixed
    {
        return $data;
    }

    /**
     * @inheritDoc
     */
    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {

        return $data instanceof File;
    }

    /**
     * @inheritDoc
     */
    public function getSupportedTypes(?string $format): array
    {
        return [
            'object' => null,
            'array' => true,
            '*' => false,
            File::class => true,
        ];
    }
}