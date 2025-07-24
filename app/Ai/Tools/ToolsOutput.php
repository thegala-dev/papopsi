<?php

namespace App\Ai\Tools;

use App\Ai\Contracts\AgentOutput;
use App\ValueObjects\Agent\Tool;
use App\ValueObjects\ValueObject;
use Illuminate\Support\Collection;
use NeuronAI\StructuredOutput\SchemaProperty;
use NeuronAI\StructuredOutput\Validation\Rules\ArrayOf;

class ToolsOutput extends ValueObject implements AgentOutput
{
    public function __construct(
        /**
         * @var \App\ValueObjects\Agent\Tool[]
         */
        #[SchemaProperty(description: 'List of kitchen tools used in the recipe, localized and optionally marked as optional', required: true)]
        #[ArrayOf(Tool::class)]
        public array $tools
    ) {}

    public function toArray(): array
    {
        return [
            'tools' => array_map(fn (Tool $tool) => $tool->toArray(), $this->tools),
        ];
    }

    public static function from(array $data): ToolsOutput
    {
        return new self(
            tools: array_map(fn (array $item) => Tool::from($item), $data),
        );
    }

    public function getTools(): Collection
    {
        return collect($this->tools);
    }
}
