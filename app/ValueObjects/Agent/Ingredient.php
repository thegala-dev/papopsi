<?php

namespace App\ValueObjects\Agent;

use App\ValueObjects\ValueObject;
use NeuronAI\StructuredOutput\SchemaProperty;
use NeuronAI\StructuredOutput\Validation\Rules\NotBlank;

class Ingredient extends ValueObject
{
    public function __construct(
        #[SchemaProperty(description: 'The ingredient label converted into a URL-friendly slug (lowercase, hyphenated)', required: true)]
        #[NotBlank]
        public string $slug,
        #[SchemaProperty(description: 'Name of the ingredient in the user\'s language (e.g., "zucchina")', required: true)]
        #[NotBlank]
        public string $label,
        #[SchemaProperty(description: 'Ingredient quantity, localized (e.g., "1 media", "1 tablespoon")', required: true)]
        #[NotBlank]
        public string $quantity,
    ) {}

    public function toArray(): array
    {
        return [
            'slug' => $this->slug,
            'label' => $this->label,
            'quantity' => $this->quantity,
        ];
    }

    public static function from(array $data): Ingredient
    {
        return new self(
            slug: $data['slug'],
            label: $data['label'],
            quantity: $data['quantity'],
        );
    }
}
