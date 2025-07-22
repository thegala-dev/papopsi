<?php

namespace App\Ai\Ingredients;

use App\ValueObjects\ValueObject;
use Illuminate\Support\Collection;

class IngredientsOutput extends ValueObject
{
    public function __construct(
        public Collection $lang,
        public Collection $quantity,
    ) {}

    public function toArray(): array
    {
        return [
            'lang' => $this->lang->toArray(),
            'quantity' => $this->quantity,
        ];
    }

    public static function from(array $data): IngredientsOutput
    {
        return new self(
            lang: collect($data['lang']),
            quantity: collect($data['quantity']),
        );
    }
}
