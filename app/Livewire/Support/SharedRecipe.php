<?php

namespace App\Livewire\Support;

use App\Ai\Recipes\RecipeOutput;
use App\Livewire\Wizard\Concerns\WithSocialShare;
use App\Livewire\Wizard\Contracts\WithSocialShare as WithSocialShareContract;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class SharedRecipe extends Component implements WithSocialShareContract
{
    use WithSocialShare;

    public function mount(): void
    {
        $recipe = $this->getRecipe();
        if ($recipe == null) {
            $this->redirectRoute('recipe.not-found');
        }
    }

    public function render()
    {
        return view('livewire.support.shared-recipe')
            ->with('recipe', $this->getRecipe())
            ->layoutData([
                'description' => __('seo.recipe_share.description'),
                'keywords' => __('seo.recipe_share.keywords'),
                'ogTitle' => __('seo.recipe_share.og_title'),
                'ogDescription' => __('seo.recipe_share.og_description'),
            ])->title(__('seo.recipe_share.title'));
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
