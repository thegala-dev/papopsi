@php /** @var \App\Managers\Wizard $wizard */ @endphp
<div class="max-w-2xl mx-auto px-4 py-12 space-y-8">
    <div class="bg-white border border-papopsi-secondary rounded-xl shadow-sm p-6">
        <h1 class="text-3xl font-bold mb-4 text-papopsi-brand">Rivediamo insieme</h1>

        <p class="text-gray-700 mb-4">
            Ecco cosa abbiamo capito: le risposte saranno usate per generare una ricetta per <strong>{{ $this->meal }}</strong> su misura.
        </p>

        <ul class="text-gray-800 text-base leading-relaxed space-y-3">
            <li class="flex items-start gap-2 group">
                <i data-lucide="baby" class="w-5 h-5 text-papopsi-info group-hover:text-papopsi-success mt-1"></i>
                <span>Età stimata: <span class="font-medium text-papopsi-text">{{ __("wizard.age.{$wizard->context->userProfile->value}") }}</span></span>
            </li>
            <li class="flex items-start gap-2 group">
                <i data-lucide="home" class="w-5 h-5 text-papopsi-info group-hover:text-papopsi-success mt-1"></i>
                <span>Zona: <span class="font-medium text-papopsi-text">{{ __("wizard.summary.{$wizard->context->cookingContext->zone}") }}</span></span>
            </li>
            <li class="flex items-start gap-2 group">
                <i data-lucide="chef-hat" class="w-5 h-5 text-papopsi-info group-hover:text-papopsi-success mt-1"></i>
                <span>Cucina: <span class="font-medium text-papopsi-text">{{ __("wizard.summary.{$wizard->context->cookingContext->kitchen}") }}</span></span>
            </li>
            <li class="flex items-start gap-2 group">
                <i data-lucide="clock" class="w-5 h-5 text-papopsi-info group-hover:text-papopsi-success mt-1"></i>
                <span>Tempo: <span class="font-medium text-papopsi-text">{{ __("wizard.summary.{$wizard->context->cookingContext->time}") }}</span></span>
            </li>
            <li class="flex items-start gap-2 group">
                <i data-lucide="book-user" class="w-5 h-5 text-papopsi-info group-hover:text-papopsi-success mt-1"></i>
                <span>Esperienza: <span class="font-medium text-papopsi-text">{{ __("wizard.summary.{$wizard->context->cookingContext->experience}") }}</span></span>
            </li>
            <li class="flex items-start gap-2 group">
                <i data-lucide="carrot" class="w-5 h-5 text-papopsi-info group-hover:text-papopsi-success mt-1"></i>
                <span>Ingredienti: <span class="font-medium text-papopsi-text">{{ $wizard->context->ingredients?->implode('label', ', ') }}</span></span>
            </li>
            <li class="flex items-start gap-2 group">
                <i data-lucide="utensils" class="w-5 h-5 text-papopsi-info group-hover:text-papopsi-success mt-1"></i>
                <span>Accessori: <span class="font-medium text-papopsi-text">{{ $wizard->context->tools?->implode('label', ', ') }}</span></span>
            </li>
        </ul>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">
            <button
                wire:click.prevent="nextStep"
                class="w-full text-center bg-white border border-gray-300 text-gray-800 font-medium py-3 px-6 rounded-lg hover:border-papopsi-brand hover:text-papopsi-brand transition"
            >
                Voglio più controllo
            </button>

            <form wire:submit="finalize">
                @csrf
                <button
                    type="submit"
                    class="w-full bg-white text-papopsi-brand border border-papopsi-brand font-semibold py-3 px-6 rounded-lg hover:bg-papopsi-brand hover:text-white transition"
                >
                    <div class="flex justify-center items-center gap-2">
                        <svg wire:loading wire:target="finalize" class="animate-spin h-5 w-5 text-papopsi-brand" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                        </svg>
                        <span wire:loading wire:target="finalize">Papopsi sta preparando la ricetta</span>
                        <span wire:loading.remove wire:target="finalize">Prepara la pappa</span>
                    </div>
                </button>
            </form>
        </div>
    </div>
</div>
