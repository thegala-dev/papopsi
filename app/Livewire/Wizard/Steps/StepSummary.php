<?php

namespace App\Livewire\Wizard\Steps;

use Livewire\Component;

class StepSummary extends Component
{
    public function render()
    {
        return view('livewire.wizard.steps.step-summary')
            ->with('wizard', session()->get('wizard'))
            ->title('Prepariamo la pappa!');
    }
}
