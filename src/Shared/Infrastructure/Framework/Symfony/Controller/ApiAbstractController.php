<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Infrastructure\Framework\Symfony\Controller;

use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;

abstract class ApiAbstractController extends BaseAbstractController
{
    public function serialize(mixed $data, string $format = 'json', array $context = []): string
    {
        /** @var SerializerInterface $serializer */
        $serializer = $this->container->get(SerializerInterface::class);
        return $serializer->serialize($data, $format, $context);
    }
}
