<?php

namespace App\Providers;

use App\Ai\Ingredients\IngredientsAgent;
use App\Ai\Recipes\RecipeAgent;
use App\Ai\Tools\ToolsAgent;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use NeuronAI\Providers\AIProviderInterface;
use NeuronAI\Providers\OpenAI\OpenAI;

class AgentsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->when(IngredientsAgent::class)
            ->needs(AIProviderInterface::class)
            ->give(function () {
                return new OpenAI(
                    key: $this->app['config']->get('neuron.providers.openai.api_key'),
                    model: $this->app['config']->get('agents.ingredients.model'),
                    parameters: Arr::whereNotNull([
                        'temperature' => config('agents.ingredients.temperature'),
                        'max_tokens' => config('agents.ingredients.max_tokens'),
                    ])
                );
            });

        $this->app->when(ToolsAgent::class)
            ->needs(AIProviderInterface::class)
            ->give(function () {
                return new OpenAI(
                    key: $this->app['config']->get('neuron.providers.openai.api_key'),
                    model: $this->app['config']->get('agents.tools.model'),
                    parameters: Arr::whereNotNull([
                        'temperature' => config('agents.tools.temperature'),
                        'max_tokens' => config('agents.tools.max_tokens'),
                    ])
                );
            });

        $this->app->when(RecipeAgent::class)
            ->needs(AIProviderInterface::class)
            ->give(function () {
                return new OpenAI(
                    key: $this->app['config']->get('neuron.providers.openai.api_key'),
                    model: $this->app['config']->get('agents.recipe.model'),
                    parameters: Arr::whereNotNull([
                        'temperature' => config('agents.recipe.temperature'),
                        'max_tokens' => config('agents.recipe.max_tokens'),
                    ])
                );
            });
    }
}
