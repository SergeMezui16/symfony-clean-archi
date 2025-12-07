<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Application\Email;

interface Mailer
{
    public function send(EmailDefinition $email): void;
}
