<?php

namespace App\Providers;

use App\Services\Contracts\PremiumAccountService as PremiumAccountServiceContract;
use App\Services\Contracts\UserSessionService as UserSessionServiceContract;
use App\Services\PremiumAccountService;
use App\Services\UserSessionService;
use Illuminate\Support\ServiceProvider;

class BusinessLogicProvider extends ServiceProvider
{
    private array $services = [
        UserSessionServiceContract::class => UserSessionService::class,
        PremiumAccountServiceContract::class => PremiumAccountService::class,
    ];

    public function register(): void
    {
        foreach ($this->services as $abstract => $instance) {
            $this->app->bind($abstract, $instance);
        }
    }
}
