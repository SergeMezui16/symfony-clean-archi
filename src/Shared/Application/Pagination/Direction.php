<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Application\Pagination;

enum Direction: string
{
    case Ascending = 'asc';
    case Descending = 'desc';
}
