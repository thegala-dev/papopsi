<?php

namespace App\Ai\Ingredients;

use App\ValueObjects\Agent\MealRequestContext;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Exceptions\PrismException;
use Prism\Prism\Prism;
use Throwable;

class IngredientsAgent
{
    /**
     * @return Collection<IngredientsOutput>|null
     */
    public function __invoke(MealRequestContext $context): ?Collection
    {
        $builder = new IngredientsPromptBuilder($context);

        try {
            $response = Prism::structured()
                ->using(Provider::OpenAI, $builder->getModel())
                ->withProviderOptions([
                    'schema' => [
                        'strict' => true
                    ]
                ])
                ->usingTemperature($builder->getTemperature())
                ->withMaxTokens($builder->getMaxTokens())
                ->withSchema($builder->getSchema())
                ->withSystemPrompt($builder->getSystemPrompt())
                ->withPrompt($builder->getPrompt())
                ->asStructured();

            return collect($response->structured['items'])->map(fn (array $item) => IngredientsOutput::from($item));
        } catch (PrismException $e) {
            Log::error('Structured generation failed:', ['error' => $e->getMessage()]);

            return null;
        } catch (Throwable $e) {
            Log::error('Generic error:', ['error' => $e->getMessage()]);

            return null;
        }
    }
}
