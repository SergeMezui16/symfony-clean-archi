<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Domain;

use CleanArchi\Shared\Domain\Exception\InvalidArgumentException;

final class Assert extends \Webmozart\Assert\Assert
{
    #[\Override]
    protected static function reportInvalidArgument($message): void
    {
        throw new InvalidArgumentException($message);
    }
}
