<?php

namespace App\Livewire\Wizard\Steps;

use App\Managers\Wizard;
use App\ValueObjects\Agent\Ingredient;
use App\ValueObjects\Agent\Tool;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

class StepDetails extends Component
{
    public Collection $ingredients;

    public Collection $tools;

    public function mount(): void
    {
        /** @var Wizard $wizard */
        $wizard = session()->get('wizard');

        $this->ingredients = $wizard?->context?->ingredients ?: collect();
        $this->tools = $wizard?->context?->tools ?: collect();
    }

    public function render()
    {
        return view('livewire.wizard.steps.step-details')
            ->title('Prepariamo la pappa!');
    }

    #[Computed]
    public function selectedIngredients(): Collection
    {
        /** @var Wizard $wizard */
        $wizard = session()->get('wizard');

        return $wizard?->context?->ingredients ?: collect();
    }

    #[Computed]
    public function selectedTools(): Collection
    {
        /** @var Wizard $wizard */
        $wizard = session()->get('wizard');

        return $wizard?->context?->tools ?: collect();
    }

    public function hasIngredient(string $slug): bool
    {
        return $this->ingredients->where('slug', $slug)->first() instanceof Ingredient;
    }

    public function toggleIngredient(string $slug): void
    {
        if ($this->hasIngredient($slug)) {
            $this->ingredients = $this->ingredients->filter(fn (Ingredient $ingredient) => $ingredient->slug !== $slug);
        } else {
            $this->ingredients->push($this->selectedIngredients()->where('slug', $slug)->first());
        }
    }

    public function reloadIngredients(): void
    {
        /** @var Wizard $wizard */
        $wizard = session()->get('wizard');
        $wizard->computeIngredients()->save();

        $this->ingredients = $wizard?->context?->ingredients ?: collect();
    }

    public function hasTool(string $slug): bool
    {
        return $this->tools->where('slug', $slug)->first() instanceof Tool;
    }

    public function toggleTool(string $slug): void
    {
        if ($this->hasTool($slug)) {
            $this->tools = $this->tools->filter(fn (Tool $tool) => $tool->slug !== $slug);
        } else {
            $this->tools->push($this->selectedTools()->where('slug', $slug)->first());
        }
    }

    public function reloadTools(): void
    {
        /** @var Wizard $wizard */
        $wizard = session()->get('wizard');
        $wizard->computeTools()->save();

        $this->tools = $wizard?->context?->tools ?: collect();
    }

    public function nextStep(): void
    {
        /** @var Wizard $wizard */
        $wizard = session()->get('wizard');
        $nextStep = $wizard->setIngredients($this->ingredients)
            ->setTools($this->tools)
            ->save()
            ->nextStep();

        $this->redirect($nextStep);
    }
}
