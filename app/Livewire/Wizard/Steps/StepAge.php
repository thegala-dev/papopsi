<?php

namespace App\Livewire\Wizard\Steps;

use App\Enums\Wizard\UserProfiles;
use App\Managers\Wizard;
use Livewire\Component;

class StepAge extends Component
{
    public function render()
    {
        return view('livewire.wizard.steps.step-age')
            ->title('Quanti anni ha il tuo bambino?');
    }

    public function nextStep(UserProfiles $userProfile): void
    {
        $this->redirect(
            Wizard::instance()->setUserProfile($userProfile)->nextStep()
        );
    }
}
