<?php

namespace App\Managers;

use App\Ai\Recipes\RecipeOutput;
use App\ValueObjects\Account\TierCookie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class Recipe
{
    public Collection $recipes;

    public function __construct(
        private readonly Request $request
    ) {
        $this->init();
    }

    private function init(): void
    {
        $this->recipes = Cache::get("recipes-{$this->request->ip()}", collect());
        $this->initSession();
    }

    public function addRecipe(RecipeOutput $recipe): void
    {
        $this->recipes->push($recipe);
        $this->save();
    }

    public function hasMoreRecipes(): bool
    {
        return $this->recipes->count() < $this->limitPerDay();
    }

    public function limitPerDay(): int
    {
        if ($this->request->hasCookie('papopsi-premium')) {
            $cookie = TierCookie::fromBase64($this->request->cookie('papopsi-premium'));

            return $cookie->recipesPerDay();
        }

        return config('account.recipes.per_day');
    }

    public function initSession(): void
    {
        if (! $this->request->session()->has('recipes')) {
            $this->updateSession();
        }
    }

    public function updateSession(): void
    {
        $this->request->session()->put('recipes', $this->recipes);
    }

    public function save(): void
    {
        Cache::put("recipes-{$this->request->ip()}", $this->recipes, $this->getTtl());
        $this->updateSession();
    }

    public function getTtl(): Carbon
    {
        $ttl = now()->addDay();

        return Cache::remember("recipes-{$this->request->ip()}-ttl", $ttl, fn () => $ttl);
    }
}
