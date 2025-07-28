<?php

namespace App\Services;

use App\Enums\Account\PremiumTiers;
use App\ValueObjects\Account\TierCookie;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\URL;

class PremiumAccountService implements Contracts\PremiumAccountService
{
    public function generateLinkFor(PremiumTiers $tier, string $email, string $name): string
    {
        $cookie = new TierCookie(
            tier: $tier,
            email: $email,
            name: $name,
            expiresAt: $this->getTtl($email, $ttl = TierCookie::newTtl($tier)),
        );

        return URL::temporarySignedRoute('account.activate', $this->getTtl($cookie->email, $ttl), ['token' => $cookie->toBase64()]);
    }

    public function getCookie(): TierCookie
    {
        return TierCookie::fromBase64(request()->cookie('papopsi-premium'));
    }

    public function getTtl(string $key, Carbon $ttl): Carbon
    {
        return Cache::remember("recipes-{$key}-ttl", $ttl, fn () => $ttl);
    }

    public function setCookie(TierCookie $cookie): TierCookie
    {
        $minutes = now()->diffInMinutes($this->getTtl($cookie->email, $cookie->expiresAt));

        Cookie::queue(cookie('papopsi-premium', $cookie->toBase64(), $minutes));

        return $cookie;
    }

    public function checkCookie(): bool
    {
        return request()->hasCookie('papopsi-premium');
    }
}
