<?php

namespace App\Livewire\Wizard\Steps;

use Livewire\Component;

class StepDetails extends Component
{
    public function render()
    {
        return view('livewire.wizard.steps.step-details')
            ->title('Prepariamo la pappa!');
    }
}
