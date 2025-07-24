<?php

namespace App\Http\Middleware;

use App\Managers\Recipe;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRecipeLimit
{
    public function handle(Request $request, Closure $next): Response
    {
        $recipe = new Recipe(request: $request);

        if ($request->route()->named('wizard.recipe.limit-reached')) {
            if ($recipe->hasMoreRecipes()) {
                return redirect()->route('home');
            }

            return $next($request);
        }

        if ($recipe->hasMoreRecipes()) {
            return $next($request);
        }

        return redirect()->route('wizard.recipe.limit-reached');
    }
}
