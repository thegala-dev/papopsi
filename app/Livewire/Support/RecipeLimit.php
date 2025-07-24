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
        $this->remainingSeconds = $manager->getTtl()->secondsSinceMidnight();
        $this->recipes = $manager->recipes;
    }

    public function render()
    {
        return view('livewire.support.recipe-limit')
            ->title('Hai esaurito le pappe per oggi!');
    }
}
