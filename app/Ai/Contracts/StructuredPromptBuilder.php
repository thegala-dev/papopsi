<?php

namespace App\Ai\Contracts;

use Prism\Prism\Contracts\Schema;

interface StructuredPromptBuilder extends PromptBuilder
{
    public function getSchema(): Schema;
}
