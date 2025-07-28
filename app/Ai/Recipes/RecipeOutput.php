<?php

namespace App\Ai\Recipes;

use App\Ai\Contracts\AgentOutput;
use App\ValueObjects\Agent\Ingredient;
use App\ValueObjects\Agent\RecipeStep;
use App\ValueObjects\Agent\Tool;
use App\ValueObjects\ValueObject;
use NeuronAI\StructuredOutput\SchemaProperty;
use NeuronAI\StructuredOutput\Validation\Rules\ArrayOf;
use NeuronAI\StructuredOutput\Validation\Rules\NotBlank;

class RecipeOutput extends ValueObject implements AgentOutput
{
    public function __construct(
        #[SchemaProperty(description: 'The recipe title', required: true)]
        #[NotBlank]
        public string $title,

        #[SchemaProperty(description: 'The recipe title converted into a URL-friendly slug (lowercase, hyphenated)', required: true)]
        #[NotBlank]
        public string $slug,

        #[SchemaProperty(description: 'A short nutritional and contextual description of the recipe, written for parents', required: true)]
        #[NotBlank]
        public string $description,

        #[SchemaProperty(description: 'Total estimated time to prepare the recipe in plain text, e.g. "30 minutes"', required: true)]
        #[NotBlank]
        public string $totalTime,

        /** @var \App\ValueObjects\Agent\Ingredient[] */
        #[SchemaProperty(description: 'The ingredients list for the recipe', required: true)]
        #[ArrayOf(Ingredient::class)]
        public array $ingredients,

        /** @var \App\ValueObjects\Agent\Tool[] */
        #[SchemaProperty(description: 'The tools list for the recipe', required: true)]
        #[ArrayOf(Tool::class)]
        public array $tools,

        /** @var \App\ValueObjects\Agent\RecipeStep[] */
        #[SchemaProperty(description: 'The recipe steps list', required: true)]
        #[ArrayOf(RecipeStep::class)]
        public array $steps,
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'totalTime' => $this->totalTime,
            'ingredients' => collect($this->ingredients)->toArray(),
            'tools' => collect($this->tools)->toArray(),
            'steps' => collect($this->steps)->toArray(),
        ];
    }

    public static function from(array $data): RecipeOutput
    {
        return new self(
            title: $data['title'],
            slug: $data['slug'],
            description: $data['description'],
            totalTime: $data['totalTime'],
            ingredients: array_map(fn (array $item) => Ingredient::from($item), $data['ingredients']),
            tools: array_map(fn (array $item) => Tool::from($item), $data['tools']),
            steps: array_map(fn (array $item) => RecipeStep::from($item), $data['steps']),
        );
    }

    public function compress(): string
    {
        return json_encode([
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'totalTime' => $this->totalTime,
            'ingredients' => collect($this->ingredients)->map(fn (Ingredient $item) => $item->compress()),
            'tools' => collect($this->tools)->map(fn (Tool $item) => $item->compress()),
            'steps' => collect($this->steps)->map(fn (RecipeStep $item) => $item->compress()),
        ]);
    }

    public static function decompress(string $base64): RecipeOutput
    {
        $data = json_decode(
            gzuncompress(base64_decode(strtr($base64, '-_', '+/'))),
            true
        );

        $data['ingredients'] = collect($data['ingredients'] ?? [])->map(fn (string $item) => Ingredient::decompress($item))->all();
        $data['tools'] = collect($data['tools'] ?? [])->map(fn (string $item) => Tool::decompress($item))->all();
        $data['steps'] = collect($data['steps'] ?? [])->map(fn (string $item) => RecipeStep::decompress($item))->all();

        return new self(
            title: $data['title'],
            slug: $data['slug'],
            description: $data['description'],
            totalTime: $data['totalTime'],
            ingredients: $data['ingredients'],
            tools: $data['tools'],
            steps: $data['steps'],
        );
    }
}
