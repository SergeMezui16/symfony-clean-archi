<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Infrastructure\Framework\Symfony\EventDispatcher;

use CleanArchi\Shared\Domain\EventDispatcher\EventDispatcher;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

final readonly class SymfonyEventDispatcher implements EventDispatcher
{
    public function __construct(
        private EventDispatcherInterface $eventDispatcher
    ) {
    }

    /**
     * @param array<int, object> $events
     */
    #[\Override]
    public function dispatch(array $events): void
    {
        foreach ($events as $event) {
            $this->eventDispatcher->dispatch($event, $event::class);
        }
    }
}
