<?php

namespace App\Ai\Recipes;

use App\Ai\Contracts\PromptBuilder;
use App\ValueObjects\Agent\MealRequestContext;

class RecipePromptBuilder implements PromptBuilder
{
    public function __construct(
        protected MealRequestContext $mealRequestContext
    ) {}

    public function getSystemPrompt(): string
    {
        return view('agents.recipe.system-prompt')->with('context', $this->mealRequestContext)->render();
    }

    public function getPrompt(): string
    {
        return view('agents.recipe.prompt')->with('context', $this->mealRequestContext)->render();
    }
}
