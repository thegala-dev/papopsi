<?php

namespace App\Ai\Ingredients;

use App\Ai\Contracts\StructuredPromptBuilder;
use App\ValueObjects\Agent\MealRequestContext;
use Prism\Prism\Contracts\Schema;
use Prism\Prism\Schema\ArraySchema;
use Prism\Prism\Schema\ObjectSchema;
use Prism\Prism\Schema\StringSchema;

class IngredientsPromptBuilder implements StructuredPromptBuilder
{
    public function __construct(
        protected MealRequestContext $mealRequestContext
    ) {
    }

    public function getTemperature(): float
    {
        return config("agents.ingredients.temperature");
    }

    public function getMaxTokens(): ?int
    {
        return config("agents.ingredients.max_tokens");
    }

    public function getModel(): ?string
    {
        return config("agents.ingredients.model");
    }

    public function getSystemPrompt(): string
    {
        return view('agents.ingredients.system-prompt')->with('context', $this->mealRequestContext)->render();
    }

    public function getPrompt(): string
    {
        return view('agents.ingredients.prompt')->with('context', $this->mealRequestContext)->render();
    }

    public function getSchema(): Schema
    {
        return new ArraySchema(
            name: 'ingredients_schema',
            description: 'The ingredients list for the recipe',
            items: new ObjectSchema(
                name: 'ingredient',
                description: 'The ingredient schema',
                properties: [
                    new ObjectSchema(
                        name: 'lang',
                        description: 'The localized ingredient labels',
                        properties: [
                            new StringSchema(
                                name: 'it',
                                description: 'The Italian name of the ingredient'
                            ),
                            new StringSchema(
                                name: 'en',
                                description: 'The English name of the ingredient'
                            ),
                        ],
                        requiredFields: ['it', 'en']
                    ),
                    new ObjectSchema(
                        name: 'quantity',
                        description: 'The localized quantity for the ingredient',
                        properties: [
                            new StringSchema(
                                name: 'it',
                                description: 'The Italian quantity label'
                            ),
                            new StringSchema(
                                name: 'en',
                                description: 'The English quantity label'
                            ),
                        ],
                        requiredFields: ['it', 'en']
                    ),
                ],
                requiredFields: ['lang', 'quantity']
            )
        );
    }
}
