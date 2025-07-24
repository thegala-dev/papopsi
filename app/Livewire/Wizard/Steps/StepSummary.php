<?php

namespace App\Livewire\Wizard\Steps;

use App\Enums\Wizard\MealType;
use App\Livewire\Wizard\Concerns\WithComputedMeal;
use App\Managers\Recipe;
use App\Managers\Wizard;
use Livewire\Component;

class StepSummary extends Component
{
    use WithComputedMeal;

    public function render()
    {
        return view('livewire.wizard.steps.step-summary')
            ->with('wizard', session()->get('wizard'))
            ->title('Prepariamo la pappa!');
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
        $recipe = Wizard::instance()->finalize();

        $manager = new Recipe(request());
        $manager->addRecipe($recipe);

        session()->put('recipe', $recipe);
    }
}
