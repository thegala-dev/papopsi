<?php

namespace App\Ai\Contracts;

interface PromptBuilder
{
    public function getSystemPrompt();

    public function getPrompt(): string;
}
