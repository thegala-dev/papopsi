<?php

namespace App\Livewire\Wizard;

use App\Ai\Recipes\RecipeOutput;
use App\Livewire\Wizard\Concerns\DispatchesToasts;
use App\Livewire\Wizard\Concerns\WithSocialShare;
use App\Livewire\Wizard\Contracts\WithSocialShare as WithSocialShareContract;
use App\Managers\Recipe as RecipeManager;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Recipe extends Component implements WithSocialShareContract
{
    use DispatchesToasts,
        WithSocialShare;

    public function render()
    {
        return view('livewire.wizard.recipe-view')
            ->with('recipe', $this->getRecipe())
            ->layoutData([
                'description' => __('seo.recipe_show.description'),
                'keywords' => __('seo.recipe_show.keywords'),
                'ogTitle' => __('seo.recipe_show.og_title'),
                'ogDescription' => __('seo.recipe_show.og_description'),
            ])->title(__('seo.recipe_show.title'));
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
