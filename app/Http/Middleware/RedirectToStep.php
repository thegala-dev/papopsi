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
        /** @var Wizard $wizard */
        $wizard = $request->session()->get('wizard');
        if ($wizard === null && ! $request->route()->named('wizard.intro')) {
            return redirect()->route('wizard.intro');
        } elseif ($wizard !== null && ! $request->route()->named($wizard->currentRoute())) {
            return redirect()->route($wizard->currentRoute());
        }

        return $next($request);
    }
}
