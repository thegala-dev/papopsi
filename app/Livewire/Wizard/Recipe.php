<?php

namespace App\Livewire\Wizard;

use App\Livewire\Wizard\Concerns\DispatchesToasts;
use App\Livewire\Wizard\Concerns\RetrievesRecipe;
use App\Managers\Recipe as RecipeManager;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Recipe extends Component
{
    use DispatchesToasts,
        RetrievesRecipe;

    public function mount(): void
    {
        if (request()->query('track', false)) {
            $this->dispatch('recipeGenerated', [
                'recipe' => $this->getRecipe()->toArray(),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.wizard.recipe-view')
            ->with('recipe', $recipe = $this->getRecipe())
            ->layoutData([
                'description' => __('seo.recipe_show.description'),
                'keywords' => __('seo.recipe_show.keywords'),
                'ogTitle' => __('seo.recipe_show.og_title', ['title' => $recipe->title]),
                'ogDescription' => __('seo.recipe_show.og_description'),
            ])->title(__('seo.recipe_show.title', ['title' => $recipe->title]));
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
}
