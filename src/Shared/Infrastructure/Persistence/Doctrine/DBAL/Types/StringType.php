<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Infrastructure\Persistence\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType as DoctrineStringType;

abstract class StringType extends DoctrineStringType
{
    protected const string TYPE = 'string';

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }

    public function getName(): string
    {
        return static::TYPE;
    }
}
