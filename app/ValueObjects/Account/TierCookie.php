<?php

namespace App\ValueObjects\Account;

use App\Enums\Account\PremiumTiers;
use App\ValueObjects\ValueObject;
use Carbon\Carbon;
use DateTimeInterface;

class TierCookie extends ValueObject
{
    public function __construct(
        public PremiumTiers $tier,
        public string $email,
        public string $name,
        public DateTimeInterface|Carbon|null $expiresAt = null
    ) {}

    public static function newTtl(PremiumTiers $tier): Carbon
    {
        return match ($tier) {
            PremiumTiers::ACCOUNT_15_DAYS => now()->addDays(15),
            PremiumTiers::ACCOUNT_30_DAYS => now()->addDays(30),
            PremiumTiers::ACCOUNT_60_DAYS => now()->addDays(60),
        };
    }

    public function maxRecipes(): string
    {
        return match ($this->tier) {
            PremiumTiers::ACCOUNT_15_DAYS => __('tiers.recipes.15_days'),
            PremiumTiers::ACCOUNT_30_DAYS => __('tiers.recipes.30_days'),
            PremiumTiers::ACCOUNT_60_DAYS => __('tiers.recipes.60_days'),
        };
    }

    public function expiration(): string
    {
        return match ($this->tier) {
            PremiumTiers::ACCOUNT_15_DAYS => __('tiers.expiration.15_days'),
            PremiumTiers::ACCOUNT_30_DAYS => __('tiers.expiration.30_days'),
            PremiumTiers::ACCOUNT_60_DAYS => __('tiers.expiration.60_days'),
        };
    }

    public function toArray(): array
    {
        return [
            'tier' => $this->tier->name,
            'email' => $this->email,
            'name' => $this->name,
            'expiresAt' => $this->expiresAt?->getTimestamp(),
        ];
    }

    public static function from(array $data): TierCookie
    {
        $tier = match ($data['tier']) {
            PremiumTiers::ACCOUNT_15_DAYS->name => PremiumTiers::ACCOUNT_15_DAYS,
            PremiumTiers::ACCOUNT_30_DAYS->name => PremiumTiers::ACCOUNT_30_DAYS,
            PremiumTiers::ACCOUNT_60_DAYS->name => PremiumTiers::ACCOUNT_60_DAYS,
        };

        return new self($tier, $data['email'], $data['name'], Carbon::createFromTimestamp($data['expiresAt']));
    }

    public static function fromBase64(string $data): TierCookie
    {
        return static::from(json_decode(base64_decode($data), true));
    }

    public function toBase64(): string
    {
        return base64_encode($this->toJson());
    }

    public function recipesPerDay(): int
    {
        return match ($this->tier) {
            PremiumTiers::ACCOUNT_15_DAYS => 5,
            PremiumTiers::ACCOUNT_30_DAYS => 10,
            PremiumTiers::ACCOUNT_60_DAYS => 20,
        };
    }
}
