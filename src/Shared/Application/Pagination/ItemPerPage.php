<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Application\Pagination;

use CleanArchi\Shared\Domain\Model\ValueObject\IntegerValue;

final readonly class ItemPerPage extends IntegerValue
{
    public function __construct(int $value)
    {
        parent::__construct(max(1, $value));
    }
}
