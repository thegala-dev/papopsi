<?php

namespace App\ValueObjects\Agent;

use App\ValueObjects\ValueObject;
use NeuronAI\StructuredOutput\SchemaProperty;
use NeuronAI\StructuredOutput\Validation\Rules\ArrayOf;
use NeuronAI\StructuredOutput\Validation\Rules\NotBlank;

class RecipeStep extends ValueObject
{
    public function __construct(
        #[SchemaProperty(description: 'The step title', required: true)]
        #[NotBlank]
        public string $title,

        #[SchemaProperty(description: 'The step title converted into a URL-friendly slug (lowercase, hyphenated)', required: true)]
        #[NotBlank]
        public string $slug,

        #[SchemaProperty(description: 'The step description', required: true)]
        #[NotBlank]
        public string $description,

        #[SchemaProperty(description: 'Estimated duration of this preparation step in natural language, e.g. "10 minutes"', required: true)]
        #[NotBlank]
        public ?string $time,

        /** @var \App\ValueObjects\Agent\Ingredient[] */
        #[SchemaProperty(description: 'The ingredients list for the step', required: false)]
        #[ArrayOf(Ingredient::class)]
        public array $ingredients,

        /** @var \App\ValueObjects\Agent\Tool[] */
        #[SchemaProperty(description: 'The tools list for the step', required: false)]
        #[ArrayOf(Tool::class)]
        public array $tools,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'time' => $this->time,
            'ingredients' => collect($this->ingredients)->toArray(),
            'tools' => collect($this->tools)->toArray(),
        ];
    }

    public static function from(array $data): ValueObject
    {
        return new self(
            title: $data['title'],
            slug: $data['slug'],
            description: $data['description'],
            time: $data['time'],
            ingredients: array_map(fn (array $item) => Ingredient::from($item), $data['ingredients']),
            tools: array_map(fn (array $item) => Tool::from($item), $data['tools']),
        );
    }
}
