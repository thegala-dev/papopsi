<?php

namespace App\Livewire\Wizard\Steps;

use App\Enums\Wizard\UserProfiles;
use App\Managers\Wizard;
use Livewire\Component;

class StepAge extends Component
{
    public function mount(): void
    {
        $this->dispatch('wizardStep', [
            'step' => 'age',
            'context' => Wizard::instance()->context->toArray(),
        ]);
    }

    public function render()
    {
        return view('livewire.wizard.steps.step-age')
            ->layoutData([
                'description' => __('seo.wizard_age.description'),
                'keywords' => __('seo.wizard_age.keywords'),
                'ogTitle' => __('seo.wizard_age.og_title'),
                'ogDescription' => __('seo.wizard_age.og_description'),
            ])->title(__('seo.wizard_age.title'));
    }

    public function nextStep(UserProfiles $userProfile): void
    {
        $this->redirect(
            Wizard::instance()->setUserProfile($userProfile)->nextStep()
        );
    }
}
