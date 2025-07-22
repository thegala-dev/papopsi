<?php

namespace App\ValueObjects\Agent;

use App\ValueObjects\ValueObject;

class Ingredient extends ValueObject
{
    public function __construct(
        public string $label,
        public string $quantity,
    ) {}

    public function toArray(): array
    {
        return [
            'label' => $this->label,
            'quantity' => $this->quantity,
        ];
    }

    public static function from(array $data): Ingredient
    {
        return new self(
            label: $data['label'],
            quantity: $data['quantity'],
        );
    }
}
