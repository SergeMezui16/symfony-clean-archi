<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Domain\Model\ValueObject;

final class HiddenEmail extends Email
{
    public function __construct(string $value)
    {
        $email = parent::__construct($value);
        $this->value = $this->hide($email);
    }

    private function hide(Email $email): string
    {
        return substr($email->username, 0, 2)
            . str_repeat('*', 5)
            . '@' . $email->domain;
    }
}
