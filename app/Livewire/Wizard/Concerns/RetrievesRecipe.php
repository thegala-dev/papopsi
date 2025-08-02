<?php

namespace App\Livewire\Wizard\Concerns;

use App\Ai\Recipes\RecipeOutput;
use App\Managers\Recipe as RecipeManager;

trait RetrievesRecipe
{
    public function encodeRecipe(RecipeOutput $recipe): string
    {
        $encoded = base64_encode(gzcompress($recipe->compress()));

        return rtrim(strtr($encoded, '+/', '-_'));
    }

    public function decodeRecipe(string $base64): RecipeOutput
    {
        return RecipeOutput::decompress($base64);
    }

    public function getRecipe(): ?RecipeOutput
    {
        if (session()->has('recipe')) {
            return session()->get('recipe');
        }

        $manager = new RecipeManager(request: request());
        if ($slug = request()->query('recipe')) {
            return $manager->recipes->firstWhere('slug', $slug);
        }

        return $manager->recipes->first();
    }
}
