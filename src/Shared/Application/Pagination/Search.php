<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Application\Pagination;

use CleanArchi\Shared\Domain\Model\ValueObject\StringValue;

final class Search extends StringValue
{
    public function lowercase(): string
    {
        return strtolower($this->value);
    }
}
