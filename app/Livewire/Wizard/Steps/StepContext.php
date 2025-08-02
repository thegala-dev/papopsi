<?php

namespace App\Livewire\Wizard\Steps;

use App\Enums\Wizard\Context\Experiences;
use App\Enums\Wizard\Context\Kitchens;
use App\Enums\Wizard\Context\Preferences;
use App\Enums\Wizard\Context\Times;
use App\Enums\Wizard\Context\Zones;
use App\Managers\Wizard;
use App\ValueObjects\Agent\CookingContext;
use Illuminate\Support\Arr;
use Livewire\Attributes\Computed;
use Livewire\Component;

class StepContext extends Component
{
    public string $zone;

    public string $preference;

    public string $time;

    public string $kitchen;

    public string $experience;

    public function mount(): void
    {
        $wizard = Wizard::instance();
        $this->dispatch('wizardStep', [
            'step' => 'cooking-context',
            'context' => $wizard->context->toArray(),
        ]);

        if ($wizard->context->cookingContext === null) {
            $wizard->setCookingContext(CookingContext::from([
                'zone' => strtolower(Arr::random(Zones::cases())->name),
                'preference' => strtolower(Arr::random(Preferences::cases())->name),
                'time' => strtolower(Arr::random(Times::cases())->name),
                'kitchen' => strtolower(Arr::random(Kitchens::cases())->name),
                'experience' => strtolower(Arr::random(Experiences::cases())->name),
            ]))->save();
        }

        $this->zone = $wizard->context->cookingContext->zone;
        $this->preference = $wizard->context->cookingContext->preference;
        $this->time = $wizard->context->cookingContext->time;
        $this->kitchen = $wizard->context->cookingContext->kitchen;
        $this->experience = $wizard->context->cookingContext->experience;
    }

    public function render()
    {
        return view('livewire.wizard.steps.step-context')
            ->layoutData([
                'description' => __('seo.wizard_context.description'),
                'keywords' => __('seo.wizard_context.keywords'),
                'ogTitle' => __('seo.wizard_context.og_title'),
                'ogDescription' => __('seo.wizard_context.og_description'),
            ])->title(__('seo.wizard_context.title'));
    }

    #[Computed]
    public function zones(): array
    {
        return Zones::localized();
    }

    #[Computed]
    public function preferences(): array
    {
        return Preferences::localized();
    }

    #[Computed]
    public function times(): array
    {
        return Times::localized();
    }

    #[Computed]
    public function kitchens(): array
    {
        return Kitchens::localized();
    }

    #[Computed]
    public function experiences(): array
    {
        return Experiences::localized();
    }

    #[Computed]
    public function zoneLocalized(): string
    {
        $zone = strtolower($this->zone);

        return __("wizard.context.{$zone}");
    }

    #[Computed]
    public function preferenceLocalized(): string
    {
        $preference = strtolower($this->preference);

        return __("wizard.context.{$preference}");
    }

    #[Computed]
    public function timeLocalized(): string
    {
        $time = strtolower($this->time);

        return __("wizard.context.{$time}");
    }

    #[Computed]
    public function kitchenLocalized(): string
    {
        $kitchen = strtolower($this->kitchen);

        return __("wizard.context.{$kitchen}");
    }

    #[Computed]
    public function experienceLocalized(): string
    {
        $experience = strtolower($this->experience);

        return __("wizard.context.{$experience}");
    }

    public function nextStep(): void
    {
        $this->redirect(
            Wizard::instance()->setCookingContext(CookingContext::from([
                'zone' => strtolower($this->zone),
                'preference' => strtolower($this->preference),
                'time' => strtolower($this->time),
                'kitchen' => strtolower($this->kitchen),
                'experience' => strtolower($this->experience),
            ]))->computeIngredients()->computeTools()->nextStep()
        );
    }
}
