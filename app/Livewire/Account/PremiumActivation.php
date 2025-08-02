<?php

namespace App\Livewire\Account;

use App\Services\Contracts\PremiumAccountService;
use App\ValueObjects\Account\TierCookie;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class PremiumActivation extends Component
{
    public TierCookie $cookie;

    public function mount(PremiumAccountService $premiumAccountService): void
    {
        if (! request()->hasCookie('papopsi-premium')) {
            $this->cookie = $premiumAccountService->setCookie($cookie = TierCookie::fromBase64(
                request()->route()->parameter('token')
            ));

            $this->dispatch('premiumActivated', [
                'plan' => strtolower($cookie->tier->name),
            ]);

            Log::debug('New Cookie', [
                'cookie' => $this->cookie->tier->name,
                'expires' => $this->cookie->expiresAt?->diffForHumans(),
            ]);
        } else {
            $this->cookie = $premiumAccountService->getCookie();

            Log::debug('Cookie exists', [
                'cookie' => $this->cookie->tier->name,
                'expires' => $this->cookie->expiresAt?->diffForHumans(),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.account.premium-activation')
            ->layoutData([
                'description' => __('seo.account_activated.description'),
                'keywords' => __('seo.account_activated.keywords'),
                'ogTitle' => __('seo.account_activated.og_title'),
                'ogDescription' => __('seo.account_activated.og_description'),
            ])->title(__('seo.account_activated.title'));
    }
}
