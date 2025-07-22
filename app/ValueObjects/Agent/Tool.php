<?php

namespace App\ValueObjects\Agent;

use App\ValueObjects\ValueObject;

class Tool extends ValueObject
{
    public function __construct(
        public string $label
    ) {}

    public function toArray(): array
    {
        return [
            'label' => $this->label,
        ];
    }

    public static function from(array $data): Tool
    {
        return new self(
            label: $data['label'],
        );
    }
}
