<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Domain\Model\ValueObject;

use CleanArchi\Shared\Domain\Assert;

class Email extends StringValue
{
    public string $domain {
        get => explode('@', $this->value)[1];
    }

    public string $username {
        get => explode('@', $this->value)[0];
    }

    public function __construct(protected(set) string $value)
    {
        $this->ensureIsValidEmail($value);
        parent::__construct($value);
    }

    private function ensureIsValidEmail(string $email): void
    {
        Assert::email($email);
    }

    public function hidden(): HiddenEmail
    {
        return HiddenEmail::fromString($this->value);
    }
}
