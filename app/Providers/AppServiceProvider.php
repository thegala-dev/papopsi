<?php

namespace App\Providers;

use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ViewFacade::composer('*', function (View $view) {
            $name = explode('.', $view->getName());
            $view = array_pop($name);
            if (in_array($view, ['home', 'step-summary', 'step-context', 'step-details', 'step-age', 'intro', 'shared-recipe', 'recipe-not-found', 'recipe-view', 'premium-activation'])) {
                ViewFacade::share('viewName', $view);
            }
        });
    }
}
