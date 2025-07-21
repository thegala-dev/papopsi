<?php

namespace App\Livewire\Wizard;

use App\Enums\Wizard\MealType;
use App\Managers\Wizard;
use App\ValueObjects\Session\RequestData;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Intro extends Component
{
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

    #[Computed]
    public function meal(): string
    {
        return match ($this->requestData->mealType()) {
            MealType::BREAKFAST => 'la colazione',
            MealType::MORNING_SNACK => 'lo spuntino',
            MealType::LUNCH => 'il pranzo',
            MealType::AFTERNOON_SNACK => 'la merenda',
            MealType::DINNER => 'la cena',
        };
    }

    public function startWizard(): void
    {
        $wizard = Wizard::start();

        $this->redirect(
            $wizard->setLocalMetadata($this->requestData->toLocalMetadata())->save()->nextStep()
        );
    }
}
