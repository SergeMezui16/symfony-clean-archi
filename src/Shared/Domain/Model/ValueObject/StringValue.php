<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Domain\Model\ValueObject;

use CleanArchi\Shared\Domain\Assert;

abstract class StringValue implements \Stringable
{
    protected function __construct(
        protected(set) string $value,
    ) {
        Assert::notEmpty($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function toString(): string
    {
        return $this->value;
    }

    public static function fromString(string $value): static
    {
        return new static($value);
    }

    public static function tryFromString(?string $value): ?static
    {
        if ($value === null) {
            return null;
        }
        return new static($value);
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }
}
