<?php

namespace App\Livewire\Wizard\Steps;

use App\Exceptions\Contracts\WizardException;
use App\Exceptions\Wizard\ToolsException;
use App\Livewire\Wizard\Concerns\DispatchesToasts;
use App\Managers\Wizard;
use App\ValueObjects\Agent\Ingredient;
use App\ValueObjects\Agent\Tool;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Throwable;

class StepDetails extends Component
{
    use DispatchesToasts;

    public Collection $ingredients;

    public Collection $tools;

    public function mount(): void
    {
        /** @var Wizard $wizard */
        $wizard = session()->get('wizard');
        $this->dispatch('wizardStep', [
            'step' => 'details',
            'context' => $wizard->context->toArray(),
        ]);

        $this->ingredients = $wizard?->context?->ingredients ?: collect();
        $this->tools = $wizard?->context?->tools ?: collect();
    }

    public function render()
    {
        return view('livewire.wizard.steps.step-details')
            ->layoutData([
                'description' => __('seo.wizard_details.description'),
                'keywords' => __('seo.wizard_details.keywords'),
                'ogTitle' => __('seo.wizard_details.og_title'),
                'ogDescription' => __('seo.wizard_details.og_description'),
            ])->title(__('seo.wizard_details.title'));
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
        try {
            /** @var Wizard $wizard */
            $wizard = session()->get('wizard');
            $wizard->computeIngredients()->save();

            $this->ingredients = $wizard?->context?->ingredients ?: collect();
        } catch (WizardException $ex) {
            $this->warning($ex->getMessage(), $ex->cta());
        } catch (Throwable $ex) {
            $this->danger($ex->getMessage());
        }
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
        try {
            /** @var Wizard $wizard */
            $wizard = session()->get('wizard');
            $wizard->computeTools()->save();

            $this->tools = $wizard?->context?->tools ?: collect();
        } catch (ToolsException $ex) {
            $this->warning($ex->getMessage(), $ex->cta());
        } catch (Throwable $ex) {
            $this->danger($ex->getMessage());
        }
    }

    public function nextStep(): void
    {
        try {
            /** @var Wizard $wizard */
            $wizard = session()->get('wizard');
            $nextStep = $wizard->setIngredients($this->ingredients)
                ->setTools($this->tools)
                ->save()
                ->nextStep();

            $this->redirect($nextStep);
        } catch (WizardException $ex) {
            $this->warning($ex->getMessage(), $ex->cta());
        } catch (Throwable $ex) {
            $this->danger($ex->getMessage());
        }
    }
}
