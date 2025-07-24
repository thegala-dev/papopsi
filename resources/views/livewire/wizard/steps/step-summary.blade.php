@php /** @var \App\Managers\Wizard $wizard */ @endphp
<div class="max-w-2xl mx-auto px-4 py-12 space-y-8">
    <div class="wizard-card">
        <h1 class="text-3xl font-bold mb-4 text-papopsi-primary">Rivediamo insieme</h1>
        <p class="text-gray-700 mb-4">
            Ecco cosa abbiamo capito: le risposte saranno usate per generare una ricetta per <strong>{{ $this->meal }}</strong> su misura.
        </p>
        <ul class="text-gray-800 text-sm space-y-1">
            <li>🍼 Età stimata: <strong>{{ __("wizard.age.{$wizard->context->userProfile->value}") }}</strong></li>
            <li>🏠 Zona: <strong>{{ __("wizard.summary.{$wizard->context->cookingContext->zone}") }}</strong></li>
            <li>🌟 Cucina: <strong>{{ __("wizard.summary.{$wizard->context->cookingContext->kitchen}") }}</strong></li>
            <li>⏱️ Tempo: <strong>{{ __("wizard.summary.{$wizard->context->cookingContext->time}") }}</strong></li>
            <li>🧑‍🍳 Esperienza: <strong>{{ __("wizard.summary.{$wizard->context->cookingContext->experience}") }}</strong></li>
            <li>📋 Ingredienti: <strong>{{ $wizard->context->ingredients?->implode('label', ', ') }}</strong></li>
            <li>📋 Accessori: <strong>{{ $wizard->context->tools?->implode('label', ', ') }}</strong></li>
        </ul>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
            <a
                class="block text-center bg-white border border-gray-300 rounded-lg py-3 px-6 text-sm font-medium text-gray-700 hover:border-papopsi-primary transition cursor-pointer"
                wire:click.prevent="nextStep()"
            >Voglio più controllo</a>
            <form wire:submit="finalize">
                @csrf
                <button type="submit" class="w-full bg-white text-papopsi-primary border border-papopsi-primary font-semibold py-3 px-6 rounded-lg hover:bg-papopsi-primary hover:text-white transition cursor-pointer">
                    <div class="flex justify-center">
                        <flux:icon.loading class="mr-2" wire:loading />
                        <span wire:loading>Papopsi sta preparando la ricetta</span>
                        <span wire:loading.remove>Prepara la pappa</span>
                    </div>
                </button>
            </form>
        </div>
    </div>
</div>
