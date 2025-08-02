<?php

namespace App\Livewire\Wizard\Concerns;

use App\Ai\Recipes\RecipeOutput;
use App\Livewire\Wizard\Contracts\WithSocialShare as WithSocialShareContract;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;

/**
 * @mixin WithSocialShareContract
 */
trait WithSocialShare
{
    #[Computed]
    public function shareRouteUrl(): string
    {
        return $this->shareRoute($this->getRecipe());
    }

    #[Computed]
    public function shareWaMessage(): string
    {
        return $this->shareTemplate('whatsapp', $this->shareRouteUrl());
    }

    protected function shareRoute(RecipeOutput $recipe): string
    {
        $hash = substr(sha1($encoded = $this->encodeRecipe($recipe)), 0, 8);
        Cache::remember("share:{$hash}", now()->addMonth(), fn () => $encoded);

        return route('recipe.share', ['token' => $hash]);
    }

    protected function shareTemplate(string $template, string $shareUrl): string
    {
        $text = __("interface.share.{$template}", ['cta' => $shareUrl]);

        return "https://wa.me/?text={$text}";
    }
}
