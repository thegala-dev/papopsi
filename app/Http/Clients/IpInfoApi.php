<?php

namespace App\Http\Clients;

use App\ValueObjects\Session\GeoData;
use Illuminate\Support\Facades\Http;

class IpInfoApi
{
    const DEFAULT_COUNTRY = 'Italy';

    public function cachedIpData(string $ip): GeoData
    {
        return cache()->remember(
            key: "info-$ip",
            ttl: now()->addDay(),
            callback: fn () => $this->getIpData($ip)
        );
    }

    private function getIpData(string $ip): GeoData
    {
        $response = Http::get(
            url: "https://ipinfo.io/{$ip}/json",
            query: ['token' => config('services.ipinfo.token')]
        );

        if ($response->successful()) {
            return GeoData::from(
                data: $response->json()
            );
        }

        return new GeoData(
            country: self::DEFAULT_COUNTRY,
            timezone: config('app.timezone'),
        );
    }
}
