<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Infrastructure\Persistence\Doctrine\DBAL\Types;

use CleanArchi\Shared\Domain\Model\ValueObject\Email;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class EmailType extends StringType
{
    public const string TYPE = 'email';

    public function convertToPHPValue($value, AbstractPlatform $platform): ?Email
    {
        if (null === $value || $value === '') {
            return null;
        }

        return Email::fromString((string) $value);
    }
}
