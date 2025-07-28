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
    public function encodeRecipe(RecipeOutput $recipe): string
    {
        $encoded = base64_encode(gzcompress($recipe->compress()));

        return rtrim(strtr($encoded, '+/', '-_'));
    }

    public function decodeRecipe(string $base64): RecipeOutput
    {
        return RecipeOutput::decompress($base64);
    }

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

    #[Computed]
    public function shareRoute(RecipeOutput $recipe): string
    {
        $hash = substr(sha1($encoded = $this->encodeRecipe($recipe)), 0, 8);
        Cache::remember("share:{$hash}", now()->addMonth(), fn () => $encoded);

        return route('recipe.share', ['token' => $hash]);
    }

    public function shareTemplate(string $template, string $shareUrl): string
    {
        $text = __("interface.share.{$template}", ['cta' => $shareUrl]);

        return "https://wa.me/?text={$text}";
    }
}
