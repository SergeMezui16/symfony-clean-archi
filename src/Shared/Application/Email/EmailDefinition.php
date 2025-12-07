<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Application\Email;

use CleanArchi\Shared\Domain\Model\ValueObject\Email;

interface EmailDefinition
{
    public function recipient(): Email;

    public function subject(): string;

    /**
     * @return array<string, mixed>
     */
    public function subjectVariables(): array;

    public function template(): string;

    /**
     * @return array<string, mixed>
     */
    public function templateVariables(): array;

    public function locale(): string;

    public function getDomain(): string;
}
