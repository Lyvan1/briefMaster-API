<?php

namespace App\Encoder;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Serializer\Encoder\DecoderInterface;

final class MultipartDecoder implements DecoderInterface
{
    public const FORMAT = 'multipart';

    public function __construct(private RequestStack $requestStack)
    {
    }

    /**
     * @inheritDoc
     */
    public function decode(string $data, string $format, array $context = []): mixed
    {

        // TODO: Implement decode() method.
        $request = $this->requestStack->getCurrentRequest();

        if (!$request) {
            return null;
        }

        return array_map(static function (string $element) {

                // Multipart form values will be encoded in JSON.

                $decoded = json_decode($element, true);

                return \is_array($decoded) ? $decoded : $element;
            }, $request->request->all()) + $request->files->all();

    }

    /**
     * @inheritDoc
     */
    public function supportsDecoding(string $format): bool
    {
        // TODO: Implement supportsDecoding() method.
        return self::FORMAT === $format;
    }
}