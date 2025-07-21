<?php

namespace App\ValueObjects\Session;

use App\ValueObjects\ValueObject;

class GeoData extends ValueObject
{
    public function __construct(
        public string $country,
        public string $timezone,
        public ?string $region = null,
        public ?string $city = null,
    ) {
    }

    public function toArray(): array
    {
        return [
            'country' => $this->country,
            'timezone' => $this->timezone,
            'region' => $this->region,
            'city' => $this->city,
        ];
    }

    static function from(array $data): GeoData
    {
        return new self(
            country: $data['country'],
            timezone: $data['timezone'],
            region: $data['region'] ?? null,
            city: $data['city'] ?? null,
        );
    }
}
