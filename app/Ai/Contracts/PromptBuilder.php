<?php

namespace App\Ai\Contracts;

interface PromptBuilder
{
    public function getSystemPrompt(): string;

    public function getPrompt(): string;

    public function getTemperature(): float;

    public function getMaxTokens(): ?int;

    public function getModel(): ?string;
}
