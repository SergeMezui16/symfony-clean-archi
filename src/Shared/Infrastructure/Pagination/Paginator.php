<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Infrastructure\Pagination;

use CleanArchi\Shared\Application\Pagination\Direction;
use CleanArchi\Shared\Application\Pagination\ItemPerPage;
use CleanArchi\Shared\Application\Pagination\Page;
use Doctrine\DBAL\Query\QueryBuilder;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;

final readonly class Paginator
{
    private const DEFAULT_SORT_DIRECTION = 'ASC';

    public function __construct(
        private PaginatorInterface $paginator,
    ) {
    }

    /**
     * @param array<string, string> $allowedSorts array of allowed sort fields with names as keys and aliases as values
     * @param Page|null $page page number
     * @param ItemPerPage|null $itemPerPage limit
     * @param string|null $sort current sorted column key in $allowedSorts
     * @param string|null $defaultSort default sorted column key in $allowedSorts
     * @param Direction|null $direction current sort direction
     * @param Direction|null $defaultDirection default sort direction
     */
    public function paginate(
        QueryBuilder $queryBuilder,
        array $allowedSorts,
        ?Page $page = null,
        ?ItemPerPage $itemPerPage = null,
        ?string $sort = null,
        ?string $defaultSort = null,
        ?Direction $direction = null,
        ?Direction $defaultDirection = null,
    ): PaginationInterface {
        if (null !== $sort && array_key_exists($sort, $allowedSorts)) {
            $queryBuilder->orderBy(
                $allowedSorts[$sort],
                $direction->value ?? ($defaultDirection->value ?? self::DEFAULT_SORT_DIRECTION)
            );
        } else {
            $queryBuilder->orderBy(
                $allowedSorts[$defaultSort],
                $direction->value ?? ($defaultDirection->value ?? self::DEFAULT_SORT_DIRECTION)
            );
        }

        $firstAllowedSort = $allowedSorts[array_key_first($allowedSorts)] ?? null;

        return $this->paginator->paginate(
            target: $queryBuilder,
            page: max(1, $page->value ?? 0),
            limit: min(100, $itemPerPage->value ?? 10),
            options: [
                PaginatorInterface::DEFAULT_SORT_FIELD_NAME => $firstAllowedSort,
                PaginatorInterface::DEFAULT_SORT_DIRECTION => $defaultDirection->value ?? self::DEFAULT_SORT_DIRECTION,
                PaginatorInterface::SORT_FIELD_ALLOW_LIST => array_values($allowedSorts),
                PaginatorInterface::DEFAULT_FILTER_FIELDS => [$firstAllowedSort],
            ]
        );
    }
}
