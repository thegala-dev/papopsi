<div class="max-w-2xl mx-auto px-4 py-4 space-y-8">
    <div class="bg-white border border-papopsi-secondary rounded-xl shadow-sm p-6">
        <h1 class="text-3xl font-bold mb-4 text-papopsi-brand">Benvenuto nel Wizard di Papopsi</h1>

        <p class="text-gray-700 mb-2">Papopsi ti aiuta a preparare un pasto buono, sano e su misura per il tuo bambino — senza stress.</p>
        <p class="text-gray-700 mb-2">Ti faremo qualche domanda: in base alle risposte, potresti aver bisogno di preparare gli ingredienti o controllare cosa hai in cucina prima di metterti ai fornelli.</p>
        <p class="text-gray-700 mb-6">L’obiettivo è evitare sprechi e darti una ricetta semplice ma adatta, senza perdere tempo.</p>

        <p class="text-lg text-center text-papopsi-brand italic mb-6">Ci vorranno meno di 2 minuti.</p>

        <!-- start: privacy notice -->
        <div class="bg-papopsi-highlight-100 border-l-4 border-papopsi-highlight p-4 rounded-lg flex items-start gap-2 mb-6">
            <div class="flex-shrink-0">
                <i data-lucide="shield-question" class="w-5 h-5 mt-1 text-papopsi-highlight"></i>
            </div>
            <p>
                I dati che inserirai non verranno salvati né condivisi. Resteranno solo nella sessione del tuo dispositivo, a meno che tu non scelga volontariamente di condividerli.
            </p>
        </div>
        <!-- end: privacy notice -->

        <!-- start: geo data info -->
        <div class="bg-papopsi-info-50 border-l-4 border-papopsi-info p-4 rounded-lg flex items-start gap-2">
            <div class="flex-shrink-0">
                <i data-lucide="info" class="w-5 h-5 mt-1 text-papopsi-info"></i>
            </div>
            <div>
                <h2 class="text-sm font-semibold text-papopsi-info uppercase mb-2">Un piccolo aiuto in più</h2>
                <p class="mb-3">Per proporti suggerimenti più pertinenti e ingredienti stagionali, abbiamo cercato di capire da dove ci stai scrivendo.</p>
                <ul class="space-y-1">
                    <li class="flex items-start gap-2">
                        <i data-lucide="globe" class="w-4 h-4 mt-0.5 text-papopsi-info"></i>
                        Papopsi creerà ricette con ingredienti reperibili in: <span class="font-bold text-papopsi-muted">{{ __("countries.{$requestData->geoData->country}", ['default' => $requestData->geoData->country]) }}</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <i data-lucide="clock" class="w-4 h-4 mt-0.5 text-papopsi-info"></i>
                        Papopsi ti darà una mano con <span class="font-bold text-papopsi-muted">{{ $this->meal }}</span>
                    </li>
                </ul>
                <p class="mt-3 text-gray-500">
                    Hai notato qualcosa di strano? <a href="{{ config('links.telegram') }}" class="underline hover:text-papopsi-info">Fammelo sapere!</a>
                </p>
            </div>
        </div>
        <!-- end: geo data info -->

        <!-- start: form -->
        <form wire:submit="startWizard()" class="space-y-4 mt-6">
            @csrf
            <div class="flex items-start gap-3">
                <input type="checkbox"
                       wire:model.live="consent"
                       id="consent"
                       required
                       class="mt-1 rounded border-gray-300 text-papopsi-brand focus:ring-papopsi-brand"
                />
                <label for="consent" class="text-sm text-gray-700">
                    Accetto che i dati vengano usati solo per questa sessione. Nessuna registrazione, nessuna condivisione.
                </label>
            </div>

            @error('consent')
            <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror

            <button type="submit"
                @class([
                        "w-full bg-papopsi-brand text-white font-semibold py-3 px-6 rounded-full transition flex justify-center gap-2",
                    "bg-papopsi-brand/90 hover:bg-papopsi-brand cursor-pointer" => $consent,
                ])
                @disabled(!$consent)
            >
                <i data-lucide="chef-hat"></i>
                <span>Prepariamo {{ $this->meal }}</span>
            </button>
        </form>
        <!-- end: form -->

    </div>
</div>
