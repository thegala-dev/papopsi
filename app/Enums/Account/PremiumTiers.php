<?php

namespace App\Enums\Account;

enum PremiumTiers
{
    case ACCOUNT_15_DAYS;
    case ACCOUNT_30_DAYS;
    case ACCOUNT_60_DAYS;

    public static function names(bool $toLowerCase = false): array
    {
        $names = array_column(self::cases(), 'name');
        if ($toLowerCase) {
            $names = array_map('strtolower', $names);
        }

        return $names;
    }
}
