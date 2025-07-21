<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="min-h-screen bg-white">
<flux:header container class="border-b border-zinc-200 bg-zinc-50">
    <a href="{{ route('home') }}" class="flex items-center space-x-2" wire:navigate>
        <span class="text-xl font-semibold text-papopsi-primary">Papopsi</span>
    </a>

    <flux:spacer />

    <flux:navbar class="me-1.5 space-x-0.5 rtl:space-x-reverse py-0!">
        <flux:tooltip :content="__('Source code')" position="bottom">
            <flux:navbar.item
                class="h-10 [&>div>svg]:size-5 text-papopsi-primary"
                icon="folder-git-2"
                href="https://github.com/laravel/livewire-starter-kit"
                target="_blank"
                :label="__('Source code')"
            />
        </flux:tooltip>
        <flux:tooltip :content="__('Telegram')" position="bottom">
            <flux:navbar.item
                class="!h-10 [&>div>svg]:size-5 text-papopsi-primary"
                icon="chat-bubble-left"
                href="#"
                :label="__('Telegram')"
            />
        </flux:tooltip>
        <flux:tooltip :content="__('Buy me a coffee')" position="bottom">
            <flux:navbar.item
                class="h-10 [&>div>svg]:size-5 text-papopsi-primary"
                icon="hand-thumb-up"
                href="https://coff.ee/thegaladev"
                target="_blank"
                label="Documentation"
            />
        </flux:tooltip>
    </flux:navbar>
</flux:header>

@if(session()->has('message'))
<div class="max-w-2xl mx-auto px-4 py-2">
    <flux:callout variant="danger" icon="x-circle">
        <flux:callout.heading>
            <p class="text-gray-700">
                <strong>Errore:</strong>
                <span>{{ session()->get('message') }}</span>
            </p>
        </flux:callout.heading>
    </flux:callout>
</div>
@endif

{{ $slot }}

@fluxScripts
</body>
</html>
