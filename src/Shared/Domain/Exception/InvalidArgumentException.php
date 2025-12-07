<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Domain\Exception;

final class InvalidArgumentException extends \RuntimeException implements UserFacingError
{
    #[\Override]
    public function translationId(): string
    {
        return $this->getMessage();
    }

    #[\Override]
    public function translationParameters(): array
    {
        return [];
    }

    #[\Override]
    public function translationDomain(): string
    {
        return 'invalid_argument';
    }
}
