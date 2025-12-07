<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Application\Pagination\Select;

use CleanArchi\Shared\Application\Pagination\ItemPerPage;
use CleanArchi\Shared\Application\Pagination\Page;
use CleanArchi\Shared\Domain\Model\ValueObject\ArrayValue;

final class SelectResultPagination extends ArrayValue
{
    public private(set) int $totalItems;

    public function __construct(
        $items,
        public private(set) readonly Page $currentPage,
        public private(set) readonly ItemPerPage $itemPerPage,
        int $totalItems,
    ) {
        parent::__construct($items, SelectResult::class);
        $this->totalItems = max(0, $totalItems);
    }
}
