<?php

namespace App\ValueObjects\Agent;

use App\ValueObjects\ValueObject;

class CookingContext extends ValueObject
{
    public function __construct(
        public string $zone,
        public string $preference,
        public string $time,
        public string $kitchen,
        public string $experience,
    ) {}

    public function toArray(): array
    {
        return [
            'zone' => $this->zone,
            'preference' => $this->preference,
            'time' => $this->time,
            'kitchen' => $this->kitchen,
            'experience' => $this->experience,
        ];
    }

    public static function from(array $data): CookingContext
    {
        return new self(
            zone: $data['zone'],
            preference: $data['preference'],
            time: $data['time'],
            kitchen: $data['kitchen'],
            experience: $data['experience'],
        );
    }
}
