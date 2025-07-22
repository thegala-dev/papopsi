<?php

namespace App\ValueObjects\Agent;

use App\ValueObjects\ValueObject;
use Illuminate\Support\Collection;

class RecipeStep extends ValueObject
{
    public function __construct(
        public string $title,
        public string $description,
        public ?string $time,
        public Collection $ingredients, // array di nomi, non oggetti
        public Collection $tools
    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'time' => $this->time,
            'ingredients' => $this->ingredients->toArray(),
            'tools' => $this->tools->toArray(),
        ];
    }

    public static function from(array $data): ValueObject
    {
        return new self(
            title: $data['title'],
            description: $data['description'],
            time: $data['time'],
            ingredients: collect($data['ingredients'])->map(fn (array $item) => Ingredient::from($item)),
            tools: collect($data['tools'])->map(fn (array $item) => Tool::from($item)),
        );
    }
}
