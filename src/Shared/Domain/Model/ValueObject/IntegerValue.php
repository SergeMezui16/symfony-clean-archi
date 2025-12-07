<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Domain\Model\ValueObject;

use CleanArchi\Shared\Domain\Assert;

abstract readonly class IntegerValue
{
    public function __construct(
        protected(set) int $value,
    ) {
        Assert::greaterThan($value, 0);
    }

    public function value(): int
    {
        return $this->value;
    }

    public static function fromInt(int $value): static
    {
        return new static($value);
    }

    public static function tryFromInt(?int $value): ?static
    {
        if (null === $value) {
            return null;
        }

        return new static($value);
    }

    public function __toString(): string
    {
        return (string)$this->value;
    }

    public function equals(self $other): bool
    {
        return $this->value === $other->value;
    }
}
