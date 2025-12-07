<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Domain\EventDispatcher;

interface EventDispatcher
{
    /**
     * @param array<int, object> $events
     */
    public function dispatch(array $events): void;
}
