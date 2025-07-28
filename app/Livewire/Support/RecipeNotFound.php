<?php

namespace App\Livewire\Support;

use Livewire\Component;

class RecipeNotFound extends Component
{
    public function render()
    {
        return view('livewire.support.recipe-not-found')
            ->layoutData([
                'description' => __('seo.recipe_not_found.description'),
                'keywords' => __('seo.recipe_not_found.keywords'),
                'ogTitle' => __('seo.recipe_not_found.og_title'),
                'ogDescription' => __('seo.recipe_not_found.og_description'),
            ])->title(__('seo.recipe_not_found.title'));
    }
}
