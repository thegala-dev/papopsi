<?php

namespace App\Livewire\Wizard\Concerns;

use App\Enums\Support\ToastType;
use App\ValueObjects\Support\Toast;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

/**
 * @mixin Component
 */
trait DispatchesToasts
{
    public function dispatchToast(ToastType $type, string $title, string $message, ?Collection $cta = null): void
    {
        $toast = Toast::from([
            'type' => $type->name,
            'title' => $title,
            'message' => $message,
            'cta' => $cta,
        ]);

        $this->dispatch('show-toast', $toast->toArray());
    }

    public function success(string $message, string $title = 'Horray!', ?Collection $cta = null): void
    {
        $this->dispatchToast(ToastType::SUCCESS, $title, $message, $cta);
    }

    public function warning(string $message, string $title = 'Attenzione!', ?Collection $cta = null): void
    {
        $this->dispatchToast(ToastType::WARNING, $title, $message, $cta);
    }

    public function danger(string $message, string $title = 'Whoops! Qualcosa è andato storto!', ?Collection $cta = null): void
    {
        $this->dispatchToast(ToastType::DANGER, $title, $message, $cta);
    }

    #[On('request-toast')]
    public function onRequestToast(string $type, string $title, string $message, ?array $cta = null): void
    {
        $type = match ($type) {
            ToastType::SUCCESS->name => ToastType::SUCCESS,
            ToastType::WARNING->name => ToastType::WARNING,
            ToastType::DANGER->name => ToastType::DANGER,
        };

        $this->dispatchToast(
            type: $type,
            title: $title,
            message: $message,
            cta: $cta === null ? collect() : collect($cta)
        );
    }
}
