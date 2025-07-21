<?php

namespace App\Services\Contracts;

use App\ValueObjects\Session\RequestData;
use Illuminate\Http\Request;

interface UserSessionService
{
    public function dataFromRequest(Request $request): RequestData;

    public function build(string $ip, ?string $preferredLanguage = null): RequestData;

    public function setSessionData(RequestData $data);
}
