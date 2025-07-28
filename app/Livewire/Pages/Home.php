<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.home')
            ->layoutData([
                'description' => __('seo.homepage.description'),
                'keywords' => __('seo.homepage.keywords'),
                'ogTitle' => __('seo.homepage.og_title'),
                'ogDescription' => __('seo.homepage.og_description'),
            ])->title(__('seo.homepage.title'));
    }
}
