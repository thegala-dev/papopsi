<?php

namespace App\Managers;

use App\Enums\Wizard\UserProfiles;
use App\Enums\Wizard\WizardSteps;
use App\ValueObjects\Agent\CookingContext;
use App\ValueObjects\Agent\IngredientEstimate;
use App\ValueObjects\Agent\LocalMetadata;
use App\ValueObjects\Agent\MealRequestContext;
use App\ValueObjects\Agent\ToolEstimate;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;
use RuntimeException;

class Wizard implements Arrayable, Jsonable, JsonSerializable
{
    public function __construct(
        public WizardSteps $step,
        public MealRequestContext $context
    ) {}

    public static function start(): Wizard
    {
        return new self(
            step: WizardSteps::INTRO,
            context: new MealRequestContext
        );
    }

    public function save(): Wizard
    {
        return tap($this, fn (Wizard $wizard) => session()->put('wizard', $wizard));
    }

    public function nextStep(): string
    {
        switch ($this->step) {
            case WizardSteps::INTRO:
                $this->step = WizardSteps::AGE;

                return route('wizard.steps.age');
            case WizardSteps::AGE:
                $this->step = WizardSteps::CONTEXT;

                return route('wizard.steps.context');
            case WizardSteps::CONTEXT:
            case WizardSteps::DETAILS:
                $this->step = WizardSteps::SUMMARY;

                return route('wizard.steps.summary');
            case WizardSteps::SUMMARY:
                $this->step = WizardSteps::DETAILS;

                return route('wizard.steps.details');
        }

        throw new RuntimeException('Invalid step');
    }

    public function currentRoute(): string
    {
        return match ($this->step) {
            WizardSteps::INTRO => 'wizard.steps.intro',
            WizardSteps::AGE => 'wizard.steps.age',
            WizardSteps::CONTEXT => 'wizard.steps.context',
            WizardSteps::SUMMARY => 'wizard.steps.summary',
            WizardSteps::DETAILS => 'wizard.steps.details',
        };
    }

    public function setLocalMetadata(LocalMetadata $localMetadata): Wizard
    {
        return tap($this, fn (Wizard $wizard) => $wizard->context->metadata = $localMetadata);
    }

    public function setUserProfile(UserProfiles $userProfile): Wizard
    {
        return tap($this, fn (Wizard $wizard) => $wizard->context->userProfile = $userProfile);
    }

    public function setCookingContext(CookingContext $cooking): Wizard
    {
        return tap($this, fn (Wizard $wizard) => $wizard->context->cookingContext = $cooking);
    }

    public function setIngredients(IngredientEstimate $ingredients): Wizard
    {
        return tap($this, fn (Wizard $wizard) => $wizard->context->ingredients = $ingredients);
    }

    public function setTools(ToolEstimate $tools): Wizard
    {
        return tap($this, fn (Wizard $wizard) => $wizard->context->tools = $tools);
    }

    public function toArray(): array
    {
        return [
            'step' => $this->step->name,
            'context' => $this->context->toArray(),
        ];
    }

    public function toJson($options = 0): false|string
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
