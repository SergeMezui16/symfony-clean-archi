<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Application\Messaging;

interface CommandBus
{
    public function handle(object $message): mixed;
}
