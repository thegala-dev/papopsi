<?php

namespace App\ValueObjects\Agent;

use App\Enums\Wizard\UserProfiles;
use App\ValueObjects\ValueObject;
use Illuminate\Support\Collection;

class MealRequestContext extends ValueObject
{
    /**
     * @param  Collection<Ingredient>|null  $ingredients
     * @param  Collection<Tool>|null  $tools
     */
    public function __construct(
        public ?UserProfiles $userProfile = null,
        public ?CookingContext $cookingContext = null,
        public ?Collection $ingredients = null,
        public ?Collection $tools = null,
        public ?LocalMetadata $metadata = null
    ) {}

    public function valid(): bool
    {
        return $this->userProfile !== null
            && $this->cookingContext !== null
            && $this->ingredients !== null
            && $this->tools !== null
            && $this->metadata !== null;
    }

    public function toArray(): array
    {
        return [
            'userProfile' => $this->userProfile?->value,
            'cookingContext' => $this->cookingContext?->toArray(),
            'ingredients' => $this->ingredients?->toArray(),
            'tools' => $this->tools?->toArray(),
            'metadata' => $this->metadata?->toArray(),
        ];
    }

    public static function from(array $data): MealRequestContext
    {
        $userProfile = null;
        if ($data['userProfile'] ?? false) {
            $userProfile = UserProfiles::from($data['userProfile']);
        }

        $cookingContext = null;
        if ($data['cookingContext'] ?? false) {
            $cookingContext = CookingContext::from($data['cookingContext']);
        }

        $metadata = null;
        if ($data['metadata'] ?? false) {
            $metadata = LocalMetadata::from($data['metadata']);
        }

        return new self(
            userProfile: $userProfile,
            cookingContext: $cookingContext,
            metadata: $metadata,
        );
    }

    public function toPromptData(): array {}
}
