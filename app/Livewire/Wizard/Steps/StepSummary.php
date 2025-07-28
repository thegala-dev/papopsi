<?php

namespace App\Livewire\Wizard\Steps;

use App\Enums\Wizard\MealType;
use App\Exceptions\Contracts\WizardException;
use App\Livewire\Wizard\Concerns\DispatchesToasts;
use App\Livewire\Wizard\Concerns\WithComputedMeal;
use App\Managers\Recipe;
use App\Managers\Wizard;
use Livewire\Component;
use Throwable;

class StepSummary extends Component
{
    use DispatchesToasts,
        WithComputedMeal;

    public function render()
    {
        return view('livewire.wizard.steps.step-summary')
            ->layoutData([
                'description' => __('seo.wizard_summary.description'),
                'keywords' => __('seo.wizard_summary.keywords'),
                'ogTitle' => __('seo.wizard_summary.og_title'),
                'ogDescription' => __('seo.wizard_summary.og_description'),
            ])->with('wizard', session()->get('wizard'))
            ->title(__('seo.wizard_summary.title'));
    }

    public function getMealType(): MealType
    {
        return Wizard::instance()->context->metadata->mealType;
    }

    public function nextStep(): void
    {
        $this->redirect(
            Wizard::instance()->nextStep()
        );
    }

    public function finalize(Recipe $recipeManager): void
    {
        $this->finalizeRecipe();
        session()->forget('wizard');

        $this->redirect(route('wizard.recipe.index'));
    }

    private function finalizeRecipe(): void
    {
        try {
            $recipe = Wizard::instance()->finalize();

            $manager = new Recipe(request());
            $manager->addRecipe($recipe);

            session()->put('recipe', $recipe);
        } catch (WizardException $ex) {
            $this->warning($ex->getMessage(), $ex->cta());
        } catch (Throwable $ex) {
            $this->danger($ex->getMessage());
        }
    }
}
