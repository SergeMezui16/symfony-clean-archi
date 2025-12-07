<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Domain\EventDispatcher;

trait EventEmitterTrait
{
    /**
     * @var array<int, object>
     */
    private array $emittedEvents = [];

    public function emitEvent(object $event): void
    {
        $this->emittedEvents[] = $event;
    }

    /**
     * @return array<int, object>
     */
    public function releaseEvents(): array
    {
        return $this->emittedEvents;
    }

}
