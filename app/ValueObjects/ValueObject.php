<?php

namespace App\ValueObjects;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;
use Livewire\Wireable;

abstract class ValueObject implements Arrayable, Jsonable, JsonSerializable, Wireable
{
    abstract static function from(array $data): self;

    public function toJson($options = 0): false|string
    {
        return json_encode($this->toArray(), $options);
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function toLivewire(): array
    {
        return $this->toArray();
    }

    public static function fromLivewire($value): ValueObject
    {
        if (is_string($value)) {
            $value = json_decode($value, true);
        }

        if (!is_array($value)) {
            throw new \RuntimeException('Invalid value');
        }

        if (method_exists(self::class, 'from')) {
            return static::from($value);
        }

        return new static(...$value);
    }
}
