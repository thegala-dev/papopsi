<?php

namespace App\ValueObjects\Agent;

use App\ValueObjects\ValueObject;
use NeuronAI\StructuredOutput\SchemaProperty;
use NeuronAI\StructuredOutput\Validation\Rules\NotBlank;

class Tool extends ValueObject
{
    public function __construct(
        #[SchemaProperty(description: 'The tool label converted into a URL-friendly slug (lowercase, hyphenated)', required: true)]
        #[NotBlank]
        public string $slug,

        #[SchemaProperty(description: 'Name of the kitchen tool, localized (e.g., "frullatore a immersione")', required: true)]
        #[NotBlank]
        public string $label,

        #[SchemaProperty(description: 'Description of how and when this tool is used during preparation', required: false)]
        #[NotBlank]
        public ?string $notes,

        #[SchemaProperty(description: 'True if the tool is optional, false otherwise', required: true)]
        public bool $optional,
    ) {}

    public function toArray(): array
    {
        return [
            'slug' => $this->slug,
            'label' => $this->label,
            'notes' => $this->notes,
            'optional' => $this->optional,
        ];
    }

    public static function from(array $data): Tool
    {
        return new self(
            slug: $data['slug'],
            label: $data['label'],
            notes: $data['notes'] ?? null,
            optional: $data['optional'] ?? false,
        );
    }

    public function compress(): string
    {
        return base64_encode($this->toJson());
    }

    public static function decompress(string $base64): Tool
    {
        return self::from(
            json_decode(base64_decode($base64), true)
        );
    }
}
