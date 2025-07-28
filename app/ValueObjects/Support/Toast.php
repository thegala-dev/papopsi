<?php

namespace App\ValueObjects\Support;

use App\Enums\Support\ToastType;
use App\ValueObjects\ValueObject;
use Illuminate\Support\Collection;

class Toast extends ValueObject
{
    public function __construct(
        public readonly ToastType $type,
        public readonly string $title,
        public readonly string $message,
        public readonly Collection $cta,
    ) {}

    public function toArray(): array
    {
        return [
            'type' => $this->type->name,
            'title' => $this->title,
            'message' => $this->message,
            'cta' => $this->cta,
        ];
    }

    public static function from(array $data): Toast
    {
        $type = match ($data['type']) {
            ToastType::SUCCESS->name => ToastType::SUCCESS,
            ToastType::WARNING->name => ToastType::WARNING,
            ToastType::DANGER->name => ToastType::DANGER,
        };

        return new self(
            type: $type,
            title: $data['title'],
            message: $data['message'],
            cta: new Collection($data['cta'] ?? []),
        );
    }
}
