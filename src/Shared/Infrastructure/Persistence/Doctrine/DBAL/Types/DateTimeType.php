<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Infrastructure\Persistence\Doctrine\DBAL\Types;

use CleanArchi\Shared\Domain\Model\ValueObject\DateTime;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DateTimeImmutableType;

class DateTimeType extends DateTimeImmutableType
{
    private const string TYPE = 'datetime';

    public function convertToPHPValue($value, AbstractPlatform $platform): ?DateTime
    {
        if (null === $value || $value instanceof DateTime) {
            return $value;
        }

        $converted = parent::convertToPHPValue($value, $platform);

        return $converted ? DateTime::instance($converted) : null;
    }

    public function getName(): string
    {
        return self::TYPE;
    }
}
