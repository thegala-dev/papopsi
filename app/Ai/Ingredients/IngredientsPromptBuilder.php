<?php

namespace App\Ai\Ingredients;

use App\Ai\Contracts\PromptBuilder;
use App\ValueObjects\Agent\MealRequestContext;

class IngredientsPromptBuilder implements PromptBuilder
{
    public function __construct(
        protected MealRequestContext $mealRequestContext
    ) {}

    public function getSystemPrompt(): string
    {
        return view('agents.ingredients.system-prompt')->with('context', $this->mealRequestContext)->render();
    }

    public function getPrompt(): string
    {
        return view('agents.ingredients.prompt')->with('context', $this->mealRequestContext)->render();
    }
}
