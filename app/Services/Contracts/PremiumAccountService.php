<?php

namespace App\Services\Contracts;

use App\Enums\Account\PremiumTiers;
use App\ValueObjects\Account\TierCookie;
use Carbon\Carbon;

interface PremiumAccountService
{
    public function generateLinkFor(PremiumTiers $tier, string $email, string $name): string;

    public function getTtl(string $key, Carbon $ttl): Carbon;

    public function setCookie(TierCookie $cookie): TierCookie;

    public function checkCookie(): bool;
}
