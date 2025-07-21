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

    public function mount()
    {
        $this->zone = strtolower(Arr::random(Zones::cases())->name);
        $this->preference = strtolower(Arr::random(Preferences::cases())->name);
        $this->time = strtolower(Arr::random(Times::cases())->name);
        $this->kitchen = strtolower(Arr::random(Kitchens::cases())->name);
        $this->experience = strtolower(Arr::random(Experiences::cases())->name);
    }

    public function render()
    {
        return view('livewire.wizard.steps.step-context')
            ->title('Prepariamo la pappa!');
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
        /** @var Wizard $wizard */
        $wizard = session()->get('wizard');

        $this->redirect(
            $wizard->setCookingContext(CookingContext::from([
                'zone' => $this->zone,
                'preference' => $this->preference,
                'time' => $this->time,
                'kitchen' => $this->kitchen,
                'experience' => $this->experience,
            ]))->save()->nextStep()
        );
    }
}
