<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Infrastructure\Pagination;

use CleanArchi\Shared\Application\Pagination\ItemPerPage;
use CleanArchi\Shared\Application\Pagination\Page;
use CleanArchi\Shared\Application\Pagination\Select\SelectQuery;
use CleanArchi\Shared\Application\Pagination\Select\SelectResult;
use CleanArchi\Shared\Application\Pagination\Select\SelectResultPagination;
use Doctrine\DBAL\Query\QueryBuilder;
use Knp\Component\Pager\PaginatorInterface;

final readonly class Selector
{
    public function __construct(
        private PaginatorInterface $paginator,
    ) {
    }

    public function select(
        QueryBuilder $queryBuilder,
        SelectQuery $query,
        string|array|null $searchField = null,
    ): SelectResultPagination {
        if (null !== $query->search) {
            $queryBuilder
                ->andWhere($queryBuilder->expr()->like($searchField, ':searchTerm'))
                ->setParameter('searchTerm', $query->search->toString());
        }

        $pagination = $this->paginator->paginate(
            target: $queryBuilder,
            page: max(1, $query->page->value ?? 0),
            limit: min(100, $query->itemPerPage->value ?? 10)
        );

        return new SelectResultPagination(
            items: array_map(
                static fn(array $item): SelectResult => SelectResult::fromArray($item),
                $pagination->getItems()
            ),
            currentPage: Page::fromInt($pagination->getCurrentPageNumber()),
            itemPerPage: ItemPerPage::fromInt($pagination->getItemNumberPerPage()),
            totalItems: $pagination->getTotalItemCount(),
        );
    }
}
