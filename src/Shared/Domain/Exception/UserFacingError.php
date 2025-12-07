<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Domain\Exception;

interface UserFacingError extends \Throwable
{
    public function translationId(): string;

    public function translationParameters(): array;

    public function translationDomain(): string;
}
