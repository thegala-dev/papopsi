<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use RuntimeException;

class RecipeNotFound extends RuntimeException
{
    public function render(Request $request): mixed
    {
        return response()->redirectToRoute('recipe.not-found');
    }
}
