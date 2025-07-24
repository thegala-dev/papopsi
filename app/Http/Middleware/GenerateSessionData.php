<?php

namespace App\Http\Middleware;

use App\Services\Contracts\UserSessionService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GenerateSessionData
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->session()->has('wizard')) {
            $userSessionService = app(UserSessionService::class);
            $userSessionService->setSessionData(
                $userSessionService->datafromRequest($request)
            );
        }

        return $next($request);
    }
}
