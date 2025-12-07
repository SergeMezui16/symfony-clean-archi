<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Infrastructure\Framework\Symfony\Messenger;

use CleanArchi\Shared\Application\Messaging\MessageBus;
use Symfony\Component\Messenger\MessageBusInterface;

final readonly class MessengerMessageBus implements MessageBus
{
    public function __construct(
        private MessageBusInterface $messageBus,
    ) {
    }

    /**
     * @throws \Throwable
     */
    public function dispatch(object $message): void
    {
        $this->messageBus->dispatch($message);
    }
}
