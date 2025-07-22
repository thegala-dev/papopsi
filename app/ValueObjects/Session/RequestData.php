<?php

namespace App\ValueObjects\Session;

use App\Enums\Wizard\MealType;
use App\ValueObjects\Agent\LocalMetadata;
use App\ValueObjects\ValueObject;
use Carbon\Carbon;
use DateTimeInterface;

class RequestData extends ValueObject
{
    public function __construct(
        public GeoData $geoData,
        public string $language,
        public DateTimeInterface $time
    ) {}

    public function toArray(): array
    {
        return [
            'geoData' => $this->geoData->toArray(),
            'language' => $this->language,
            'time' => $this->time->format('Y-m-d H:i:s'),
        ];
    }

    public static function from(array $data): static
    {
        return new self(
            geoData: $geoData = GeoData::from($data['geoData']),
            language: $data['language'],
            time: Carbon::createFromFormat('Y-m-d H:i:s', $data['time'] ?? null, $geoData->timezone)
        );
    }

    public function toLocalMetadata(): LocalMetadata
    {
        return new LocalMetadata(
            region: $this->geoData->region,
            timezone: $this->geoData->timezone,
            time: $this->time->format('H:i'),
            mealType: $this->mealType()
        );
    }

    public function mealType(): MealType
    {
        /** @var Carbon $time */
        $hour = (int) $this->time->format('H');
        $min = (int) $this->time->format('i');
        $time = $hour + $min / 60;

        if ($time >= 21 || $time < 9) {
            return MealType::BREAKFAST;
        }

        if ($time < 11) {
            return MealType::MORNING_SNACK;
        }

        if ($time < 13) {
            return MealType::LUNCH;
        }

        if ($time < 17) {
            return MealType::AFTERNOON_SNACK;
        }

        return MealType::DINNER;
    }
}
