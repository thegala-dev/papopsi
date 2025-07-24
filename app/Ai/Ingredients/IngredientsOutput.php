<?php

namespace App\Ai\Ingredients;

use App\Ai\Contracts\AgentOutput;
use App\ValueObjects\Agent\Ingredient;
use App\ValueObjects\ValueObject;
use Illuminate\Support\Collection;
use NeuronAI\StructuredOutput\SchemaProperty;
use NeuronAI\StructuredOutput\Validation\Rules\ArrayOf;

class IngredientsOutput extends ValueObject implements AgentOutput
{
    public function __construct(
        /**
         * @var \App\ValueObjects\Agent\Ingredient[]
         */
        #[SchemaProperty(description: 'List of ingredients for the recipe, including label and quantity, localized in the user language', required: true)]
        #[ArrayOf(Ingredient::class)]
        public array $ingredients
    ) {}

    public function toArray(): array
    {
        return [
            'ingredients' => array_map(fn (Ingredient $ingredient) => $ingredient->toArray(), $this->ingredients),
        ];
    }

    public static function from(array $data): IngredientsOutput
    {
        return new self(
            ingredients: array_map(fn (array $item) => Ingredient::from($item), $data),
        );
    }

    public function getIngredients(): Collection
    {
        return collect($this->ingredients);
    }
}
