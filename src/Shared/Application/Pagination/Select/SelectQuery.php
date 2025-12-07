<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Application\Pagination\Select;

use CleanArchi\Shared\Application\Pagination\ItemPerPage;
use CleanArchi\Shared\Application\Pagination\Page;
use CleanArchi\Shared\Application\Pagination\Search;

abstract readonly class SelectQuery
{
    public function __construct(
        private(set) ?Search $search = null,
        private(set) ?Page $page = null,
        private(set) ?ItemPerPage $limit = null,
    ) {
    }

    public static function withParams(
        ?Search $search = null,
        ?Page $page = null,
        ?ItemPerPage $limit = null,
    ): static {
        return new static(
            search: $search,
            page: $page,
            limit: $limit,
        );
    }
}
