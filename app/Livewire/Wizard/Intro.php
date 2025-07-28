<?php

namespace App\Livewire\Wizard;

use App\Enums\Wizard\MealType;
use App\Livewire\Wizard\Concerns\DispatchesToasts;
use App\Livewire\Wizard\Concerns\WithComputedMeal;
use App\Managers\Wizard;
use App\ValueObjects\Session\RequestData;
use Livewire\Component;

class Intro extends Component
{
    use DispatchesToasts,
        WithComputedMeal;

    public RequestData $requestData;

    public bool $consent = false;

    public function mount(): void
    {
        if (! session()->has('requestData')) {
            $this->danger(
                message: 'Papopsi ha provato a cucinare qualcosa per te, ma sembra che ci sia stato un imprevisto. Niente paura: puoi riprovare tra poco o scriverci per capire cosa è successo.',
                title: 'Qualcosa non torna nel pentolone…',
                cta: collect(['reloadPage' => true, 'mailTo' => true])
            );
        }

        $this->requestData = session()->get('requestData');
    }

    public function render()
    {
        return view('livewire.wizard.intro')
            ->layoutData([
                'description' => __('seo.wizard_intro.description'),
                'keywords' => __('seo.wizard_intro.keywords'),
                'ogTitle' => __('seo.wizard_intro.og_title'),
                'ogDescription' => __('seo.wizard_intro.og_description'),
            ])->title(__('seo.wizard_intro.title'));
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
