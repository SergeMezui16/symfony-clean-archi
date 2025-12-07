<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Infrastructure\Persistence\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\GuidType;

abstract class UuidType extends GuidType
{
    protected const string TYPE = 'uuid';

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }

    public function getName(): string
    {
        return static::TYPE;
    }
}
