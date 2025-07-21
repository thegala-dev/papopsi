<?php

namespace App\Services;

use App\Http\Clients\IpInfoApi;
use App\ValueObjects\Session\RequestData;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserSessionService implements Contracts\UserSessionService
{
    public function __construct(
        private readonly IpInfoApi $ipApi
    ) {}

    public function dataFromRequest(Request $request): RequestData
    {
        $ip = $this->format($request->ip());

        return $this->build($ip, $request->getPreferredLanguage(
            config('app.supported_locale')
        ));
    }

    public function build(string $ip, ?string $preferredLanguage = null): RequestData
    {
        $lang = $preferredLanguage ?: config('app.locale');

        return new RequestData(
            geoData: $geoData = $this->ipApi->retrieveIpData($ip),
            language: $lang,
            time: Carbon::now($geoData->timezone)
        );
    }

    public function setSessionData(RequestData $data): void
    {
        app()->setLocale($data->language);
        session()->put('requestData', $data);
    }

    private function format(?string $ip): string
    {
        $localIps = ['127.0.0.1', '::1', 'localhost'];

        if (empty($ip)
            || in_array($ip, $localIps, true)
            || ! filter_var($ip, FILTER_VALIDATE_IP)
        ) {
            return config('services.ipinfo.localhost_ip', '8.8.8.8');
        }

        return $ip;
    }
}
