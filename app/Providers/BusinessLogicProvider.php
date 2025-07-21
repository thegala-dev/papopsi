<?php

namespace App\Providers;

use App\Services\Contracts\UserSessionService as UserSessionServiceContract;
use App\Services\UserSessionService;
use Illuminate\Support\ServiceProvider;

class BusinessLogicProvider extends ServiceProvider
{
    private array $services = [
        UserSessionServiceContract::class => UserSessionService::class
    ];

    public function register(): void
    {
        foreach ($this->services as $abstract => $instance) {
            $this->app->bind($abstract, $instance);
        }
    }
}
