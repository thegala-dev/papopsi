<?php

namespace App\Livewire\Support;

use App\Ai\Recipes\RecipeOutput;
use App\Livewire\Wizard\Concerns\RetrievesRecipe;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class SharedRecipe extends Component
{
    use RetrievesRecipe;

    public function mount(): void
    {
        $recipe = $this->getRecipe();
        if ($recipe == null) {
            $this->redirectRoute('recipe.not-found');
        }

        $this->dispatch('recipeSharedOpen', [
            'recipe' => $recipe->toArray(),
        ]);
    }

    public function render()
    {
        return view('livewire.support.shared-recipe')
            ->with('recipe', $recipe = $this->getRecipe())
            ->layoutData([
                'description' => __('seo.recipe_share.description'),
                'keywords' => __('seo.recipe_share.keywords'),
                'ogTitle' => __('seo.recipe_share.og_title', ['title' => $recipe->title]),
                'ogDescription' => __('seo.recipe_share.og_description'),
            ])->title(__('seo.recipe_share.title', ['title' => $recipe->title]));
    }

    public function getRecipe(): ?RecipeOutput
    {
        $token = request()->route()->parameter('token');
        $base64 = Cache::get("share:{$token}");

        if ($base64 === null) {
            return null;
        }

        return $this->decodeRecipe($base64);
    }
}
