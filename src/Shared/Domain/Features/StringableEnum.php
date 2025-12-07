<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Domain\Features;

trait StringableEnum
{
    public static function tryFromString(?string $value): ?self
    {
        if (null === $value) {
            return null;
        }

        return self::tryFrom($value);
    }
}
