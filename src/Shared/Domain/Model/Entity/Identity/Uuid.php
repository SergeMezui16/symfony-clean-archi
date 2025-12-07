<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Domain\Model\Entity\Identity;

use Symfony\Component\Uid\UuidV7;

class Uuid extends UuidV7
{
    public static function tryFromString(?string $value): ?static
    {
        if (null === $value) {
            return null;
        }

        try {
            return parent::fromString($value);
        } catch (\InvalidArgumentException) {
            return null;
        }
    }
}
