<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Application\Pagination;

use CleanArchi\Shared\Domain\Model\ValueObject\ArrayValue;

/**
 * @template T of object
 */
class PaginatedCollection extends ArrayValue
{
    public private(set) int $totalItems;

    /**
     * @param array<int, object> $elements
     * @param class-string<T>    $className
     */
    public function __construct(
        array $elements,
        string $className,
        public private(set) readonly Page $currentPage,
        public private(set) readonly ItemPerPage $itemPerPage,
        int $totalItems,
        public private(set) readonly ?string $sort = null,
        public private(set) readonly ?Direction $direction = Direction::Descending,
    ) {
        parent::__construct($elements, $className);
        $this->totalItems = max(0, $totalItems);
    }

    public function getTotalPages(): int
    {
        $perPage = $this->itemPerPage->value;
        $total = $this->totalItems ?: 1;

        return (int) max(1, ceil($total / $perPage));
    }

    public function hasNextPage(): bool
    {
        return $this->currentPage->value < $this->getTotalPages();
    }

    public function hasPreviousPage(): bool
    {
        return $this->currentPage->value > 1;
    }
}
