<?php

namespace App\Livewire\Support;

use App\Managers\Recipe;
use Illuminate\Support\Collection;
use Livewire\Component;

class RecipeLimit extends Component
{
    public int $remainingSeconds;

    public Collection $recipes;

    public function mount()
    {
        $manager = new Recipe(request());
        $this->remainingSeconds = now()->diffInSeconds($manager->getTtl());
        $this->recipes = $manager->recipes;
    }

    public function render()
    {
        return view('livewire.support.recipe-limit')
            ->layoutData([
                'description' => __('seo.recipe_limit.description'),
                'keywords' => __('seo.recipe_limit.keywords'),
                'ogTitle' => __('seo.recipe_limit.og_title'),
                'ogDescription' => __('seo.recipe_limit.og_description'),
            ])->title(__('seo.recipe_limit.title'));
    }
}
