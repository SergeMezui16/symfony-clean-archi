<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Application\Pagination\Select;

final readonly class SelectResult
{
    public function __construct(
        private(set) string $value,
        private(set) string $text,
        private(set) ?string $picture = null,
        private(set) ?string $description = null,
        private(set) ?bool $marked = false,
    ) {
    }

    public static function fromArray(array $data): self
    {
        $description = isset($data['description']) ? trim($data['description']) : null;
        return new self(
            value: $data['value'],
            text: $data['text'],
            picture: $data['picture'] ?? null,
            description: !empty($description) ? $description : null,
            marked: isset($data['marked']) && !!$data['marked'],
        );
    }
}
