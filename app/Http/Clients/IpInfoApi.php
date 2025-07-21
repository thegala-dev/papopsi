<?php

namespace App\Http\Clients;

use App\ValueObjects\Session\GeoData;
use Illuminate\Support\Facades\Http;

class IpInfoApi
{
    const DEFAULT_COUNTRY = 'Italy';

    public function retrieveIpData(string $ip): GeoData
    {
        return cache()->remember($ip, now()->addMinutes(30), function () use ($ip) {
            $response = Http::get("https://ipinfo.io/{$ip}/json", [
                'token' => config('services.ipinfo.token'),
            ]);

            if ($response->successful()) {
                return GeoData::from($response->json());
            }

            return new GeoData(
                country: self::DEFAULT_COUNTRY,
                timezone: config('app.timezone'),
            );
        });
    }
}
