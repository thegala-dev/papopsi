<?php

namespace App\Managers;

use App\Ai\Ingredients\IngredientsAgent;
use App\Ai\Ingredients\IngredientsOutput;
use App\Ai\Ingredients\IngredientsPromptBuilder;
use App\Ai\Recipes\RecipeAgent;
use App\Ai\Recipes\RecipeOutput;
use App\Ai\Recipes\RecipePromptBuilder;
use App\Ai\Tools\ToolsAgent;
use App\Ai\Tools\ToolsOutput;
use App\Ai\Tools\ToolsPromptBuilder;
use App\Enums\Wizard\UserProfiles;
use App\Enums\Wizard\WizardSteps;
use App\Exceptions\Wizard\IngredientsException;
use App\Exceptions\Wizard\RecipeException;
use App\Exceptions\Wizard\ToolsException;
use App\ValueObjects\Agent\CookingContext;
use App\ValueObjects\Agent\LocalMetadata;
use App\ValueObjects\Agent\MealRequestContext;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use JsonSerializable;
use NeuronAI\Exceptions\NeuronException;

class Wizard implements Arrayable, Jsonable, JsonSerializable
{
    public function __construct(
        public WizardSteps $step,
        public MealRequestContext $context
    ) {}

    public static function instance(): Wizard
    {
        if (session()->has('wizard')) {
            return session()->get('wizard');
        }

        return self::start();
    }

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
        $route = null;
        switch ($this->step) {
            case WizardSteps::INTRO:
                $this->step = WizardSteps::AGE;

                $route = route('wizard.steps.age');
                break;
            case WizardSteps::AGE:
                $this->step = WizardSteps::CONTEXT;

                $route = route('wizard.steps.context');
                break;
            case WizardSteps::CONTEXT:
            case WizardSteps::DETAILS:
                $this->step = WizardSteps::SUMMARY;

                $route = route('wizard.steps.summary');
                break;
            case WizardSteps::SUMMARY:
                $this->step = WizardSteps::DETAILS;

                $route = route('wizard.steps.details');
                break;
        }

        $this->save();

        return $route;
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

    public function setIngredients(Collection $ingredients): Wizard
    {
        return tap($this, fn (Wizard $wizard) => $wizard->context->ingredients = $ingredients);
    }

    public function setTools(Collection $tools): Wizard
    {
        return tap($this, fn (Wizard $wizard) => $wizard->context->tools = $tools);
    }

    /** @throws ToolsException|BindingResolutionException */
    public function computeIngredients(): Wizard
    {
        try {
            $agent = app()->make(IngredientsAgent::class);
            /** @var IngredientsOutput $response */
            $response = $agent->execute(new IngredientsPromptBuilder($this->context));

            if ($response === null) {
                throw new IngredientsException(
                    cta: collect(['reloadPage' => true, 'mailTo' => true]),
                );
            }

            return $this->setIngredients(collect($response->ingredients));
        } catch (NeuronException $ex) {
            throw new IngredientsException(
                cta: collect(['reloadPage' => true, 'mailTo' => true]),
                previous: $ex
            );
        }
    }

    /** @throws ToolsException|BindingResolutionException */
    public function computeTools(): Wizard
    {
        try {
            $agent = app()->make(ToolsAgent::class);
            /** @var ToolsOutput $response */
            $response = $agent->execute(new ToolsPromptBuilder($this->context));

            if ($response === null) {
                throw new ToolsException(
                    cta: collect(['reloadPage' => true, 'mailTo' => true]),
                );
            }

            return $this->setTools(collect($response->tools));
        } catch (NeuronException $ex) {
            throw new ToolsException(
                cta: collect(['reloadPage' => true, 'mailTo' => true]),
                previous: $ex
            );
        }
    }

    /** @throws ToolsException|BindingResolutionException */
    public function finalize(): RecipeOutput
    {
        try {
            $agent = app()->make(RecipeAgent::class);

            return $agent->execute(new RecipePromptBuilder($this->context));
        } catch (NeuronException $ex) {
            Log::error($ex->getMessage(), [
                'context' => $this->context->toArray(),
            ]);
            throw new RecipeException(
                cta: collect(['reloadPage' => true, 'mailTo' => true])
            );
        }
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
