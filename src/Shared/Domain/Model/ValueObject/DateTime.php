<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Domain\Model\ValueObject;

use Carbon\CarbonImmutable;

class DateTime extends CarbonImmutable
{
    public static function fromString(string $value): self
    {
        return new self($value);
    }

    public static function tryFromString(?string $value): ?self
    {
        if ($value === null) {
            return null;
        }

        return new self($value);
    }
}
