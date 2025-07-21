<?php

namespace App\ValueObjects\Agent;

use App\Enums\Wizard\MealType;
use App\ValueObjects\ValueObject;

class LocalMetadata extends ValueObject
{
    public function __construct(
        public string $region,
        public string $timezone,
        public string $time,
        public MealType $mealType
    ) {}

    public function toArray(): array
    {
        return [
            'region' => $this->region,
            'timezone' => $this->timezone,
            'time' => $this->time,
            'mealType' => $this->mealType->name,
        ];
    }

    public static function from(array $data): ValueObject
    {
        $mealType = $data['mealType'];
        if (! $mealType instanceof MealType) {
            $mealType = MealType::{$mealType};
        }

        return new self(
            region: $data['region'],
            timezone: $data['timezone'],
            time: $data['time'],
            mealType: $mealType
        );
    }
}
