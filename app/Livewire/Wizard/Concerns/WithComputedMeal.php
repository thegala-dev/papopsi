<?php

namespace App\Livewire\Wizard\Concerns;

use App\Enums\Wizard\MealType;
use Livewire\Attributes\Computed;

trait WithComputedMeal
{
    abstract public function getMealType(): MealType;

    #[Computed]
    public function meal(): string
    {
        return match ($this->getMealType()) {
            MealType::BREAKFAST => 'la colazione',
            MealType::MORNING_SNACK => 'lo spuntino',
            MealType::LUNCH => 'il pranzo',
            MealType::AFTERNOON_SNACK => 'la merenda',
            MealType::DINNER => 'la cena',
        };
    }
}
