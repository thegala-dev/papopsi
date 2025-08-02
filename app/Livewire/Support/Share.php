<?php

namespace App\Livewire\Support;

use App\Livewire\Wizard\Concerns\RetrievesRecipe;
use App\Livewire\Wizard\Concerns\WithSocialShare;
use App\Livewire\Wizard\Contracts\WithSocialShare as WithSocialShareContract;
use Livewire\Component;

class Share extends Component implements WithSocialShareContract
{
    use RetrievesRecipe,
        WithSocialShare;

    public function render()
    {
        return view('livewire.support.share', [
            'recipe' => $this->getRecipe(),
        ]);
    }
}
