<?php

namespace App\Livewire\Wizard\Contracts;

use App\Ai\Recipes\RecipeOutput;
use Livewire\Attributes\Computed;

interface WithSocialShare
{
    public function getRecipe(): ?RecipeOutput;

    #[Computed]
    public function shareRoute(RecipeOutput $recipe): string;

    #[Computed]
    public function shareWaMessage(): string;

    public function shareTemplate(string $template, string $shareUrl): string;
}
