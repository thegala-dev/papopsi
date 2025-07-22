<?php

namespace App\Ai\Tools;

use App\ValueObjects\Agent\Ingredient;
use App\ValueObjects\Agent\RecipeStep;
use App\ValueObjects\Agent\Tool;
use App\ValueObjects\ValueObject;
use Illuminate\Support\Collection;

class ToolsOutput extends ValueObject
{
    /**
     * @param  Collection<Ingredient>  $ingredients
     * @param  Collection<Tool>  $tools
     * @param  Collection<RecipeStep>  $steps
     */
    public function __construct(
        public string $title,
        public string $description,
        public string $totalTime,
        public Collection $ingredients,
        public Collection $tools,
        public Collection $steps,
    ) {}

    public function toArray(): array
    {
        return [];
    }

    public static function from(array $data): ToolsOutput
    {
        return new self(
            title: $data['title'],
            description: $data['description'],
            totalTime: $data['totalTime'],
            ingredients: collect($data['ingredients'])->map(fn (array $item) => Ingredient::from($item)),
            tools: collect($data['tools'])->map(fn (array $item) => Tool::from($item)),
            steps: collect($data['steps'])->map(fn (array $item) => RecipeStep::from($item)),
        );
    }
}
