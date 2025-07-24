<?php

namespace App\Enums\Wizard\Concerns;

use Illuminate\Support\Arr;

trait HasLocalization
{
    public static function localized(): array
    {
        return Arr::mapWithKeys(self::cases(), function (self $item) {
            $name = strtolower($item->name);

            return [$name => __("wizard.context.{$name}")];
        });
    }
}
