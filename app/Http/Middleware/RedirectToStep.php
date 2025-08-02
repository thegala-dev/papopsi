<?php

namespace App\Http\Middleware;

use App\Managers\Wizard;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectToStep
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->route()->named('wizard.recipe.limit-reached')) {
            return $next($request);
        }

        if (! $request->session()->has('wizard')) {
            if (! $request->routeIs('wizard.intro')) {
                return redirect()->route('wizard.intro', ['source' => 'redirect-to-step']);
            }

            return $next($request);
        }

        /** @var Wizard $wizard */
        $wizard = $request->session()->get('wizard');
        if (! $request->route()->named($wizard->currentRoute())) {
            return redirect()->route($wizard->currentRoute());
        }

        return $next($request);
    }
}
