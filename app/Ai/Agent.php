<?php

namespace App\Ai;

use App\Ai\Contracts\AgentOutput;
use App\Ai\Contracts\PromptBuilder;
use Illuminate\Support\Facades\Log;
use NeuronAI\Agent as NeuronAgent;
use NeuronAI\Chat\Messages\UserMessage;
use NeuronAI\Exceptions\NeuronException;
use NeuronAI\Exceptions\ProviderException;
use NeuronAI\Providers\AIProviderInterface;

abstract class Agent extends NeuronAgent
{
    public function __construct(
        protected AIProviderInterface $provider,
    ) {}

    public function execute(PromptBuilder $builder): ?AgentOutput
    {
        try {
            /** @var AgentOutput $response */
            $response = $this->withInstructions(
                $builder->getSystemPrompt()
            )->structured(
                new UserMessage($builder->getPrompt())
            );

            Log::debug('Agent response', $response->toArray());

            return $response;
        } catch (NeuronException $e) {
            Log::error($e->getMessage(), [
                'system_prompt' => $builder->getSystemPrompt(),
                'prompt' => $builder->getPrompt(),
            ]);

            return null;
        } catch (ProviderException $e) {
            Log::error($e->getMessage(), [
                'system_prompt' => $builder->getSystemPrompt(),
                'prompt' => $builder->getPrompt(),
            ]);

            return null;
        }
    }
}
