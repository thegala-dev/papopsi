<?php

namespace App\Livewire\Wizard;

use App\Ai\Recipes\RecipeOutput;
use App\Managers\Recipe as RecipeManager;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Recipe extends Component
{
    public function render()
    {
        return view('livewire.wizard.recipe-view')->with('recipe', $this->getRecipe());
    }

    #[Computed]
    public function recipeLimitReached(): bool
    {
        $manager = new RecipeManager(request: request());

        return ! $manager->hasMoreRecipes();
    }

    #[Computed]
    public function remainingRecipes(): int
    {
        $manager = new RecipeManager(request: request());

        return $manager->limitPerDay() - $manager->recipes->count();
    }

    private function getRecipe(): RecipeOutput
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
