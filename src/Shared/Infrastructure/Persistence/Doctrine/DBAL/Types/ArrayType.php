<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Infrastructure\Persistence\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\JsonType;

class ArrayType extends JsonType
{
    protected const string TYPE = 'array';

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }

    public function getName(): string
    {
        return static::TYPE;
    }
}
