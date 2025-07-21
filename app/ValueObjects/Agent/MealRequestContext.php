<?php

namespace App\ValueObjects\Agent;

use App\Enums\Wizard\UserProfiles;
use App\ValueObjects\ValueObject;

class MealRequestContext extends ValueObject
{
    public function __construct(
        public ?UserProfiles       $userProfile = null,
        public ?CookingContext     $cookingContext = null,
        public ?IngredientEstimate $ingredients = null,
        public ?ToolEstimate       $tools = null,
        public ?LocalMetadata      $metadata = null
    ) {
    }

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
            'cookingContext' => $this->cookingContext->toArray(),
            'metadata' => $this->metadata->toArray(),
        ];
    }

    static function from(array $data): MealRequestContext
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
}
