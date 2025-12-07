<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Infrastructure\Persistence\Doctrine\DBAL\Types;

use Carbon\Doctrine\CarbonType;
use CleanArchi\Shared\Domain\Model\ValueObject\DateTime;

class DateTimeType extends CarbonType
{
    protected const string TYPE = 'datetime';

    /**
     * @psalm-return DateTime::class
     */
    protected function getCarbonClassName(): string
    {
        return DateTime::class;
    }

    public function getName(): string
    {
        return self::TYPE;
    }
}
