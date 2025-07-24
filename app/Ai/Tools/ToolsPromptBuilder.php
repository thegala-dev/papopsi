<?php

namespace App\Ai\Tools;

use App\Ai\Contracts\PromptBuilder;
use App\ValueObjects\Agent\MealRequestContext;

class ToolsPromptBuilder implements PromptBuilder
{
    public function __construct(
        protected MealRequestContext $mealRequestContext
    ) {}

    public function getSystemPrompt(): string
    {
        return view('agents.tools.system-prompt')->with('context', $this->mealRequestContext)->render();
    }

    public function getPrompt(): string
    {
        return view('agents.tools.prompt')->with('context', $this->mealRequestContext)->render();
    }
}
