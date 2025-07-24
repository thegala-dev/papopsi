<?php

namespace App\Ai\Ingredients;

use App\Ai\Agent;
use NeuronAI\Providers\AIProviderInterface;

class IngredientsAgent extends Agent
{
    protected function provider(): AIProviderInterface
    {
        return $this->provider;
    }

    protected function getOutputClass(): string
    {
        return IngredientsOutput::class;
    }
}
