<?php

namespace App\Livewire\Wizard;

use App\Enums\Wizard\MealType;
use App\Livewire\Wizard\Concerns\WithComputedMeal;
use App\Managers\Wizard;
use App\ValueObjects\Session\RequestData;
use Livewire\Component;

class Intro extends Component
{
    use WithComputedMeal;

    public RequestData $requestData;

    public bool $consent = false;

    public function mount(): void
    {
        if (! session()->has('requestData')) {
            throw new \RuntimeException('RequestData not set');
        }

        $this->requestData = session()->get('requestData');
    }

    public function render()
    {
        return view('livewire.wizard.intro')
            ->title('Prepariamo la pappa!');
    }

    public function getMealType(): MealType
    {
        return $this->requestData->mealType();
    }

    public function startWizard(): void
    {
        $wizard = Wizard::start();

        $this->redirect(
            $wizard->setLocalMetadata($this->requestData->toLocalMetadata())->nextStep()
        );
    }
}
