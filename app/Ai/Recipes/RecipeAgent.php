<?php

namespace App\Ai\Recipes;

use App\Ai\Agent;
use NeuronAI\Providers\AIProviderInterface;

class RecipeAgent extends Agent
{
    protected function provider(): AIProviderInterface
    {
        return $this->provider;
    }

    protected function getOutputClass(): string
    {
        return RecipeOutput::class;
    }
}
