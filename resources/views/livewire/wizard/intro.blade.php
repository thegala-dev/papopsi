<div class="max-w-2xl mx-auto px-4 py-4 space-y-8">
    <div class="wizard-card">
        <h1 class="text-3xl font-bold mb-4 text-papopsi-primary">Benvenuto nel Wizard di Papopsi</h1>

        <p class="text-gray-700 mb-2">Papopsi ti aiuta a preparare un pasto buono, sano e su misura per il tuo bambino — senza stress.</p>
        <p class="text-gray-700 mb-2">Ti faremo qualche domanda: in base alle risposte, potresti aver bisogno di preparare gli ingredienti o controllare cosa hai in cucina prima di metterti ai fornelli.</p>
        <p class="text-gray-700 mb-6">L’obiettivo è evitare sprechi e darti una ricetta semplice ma adatta, senza perdere tempo.</p>

        <p class="text-lg text-center text-gray-500 italic mb-6">Ci vorranno meno di 2 minuti.</p>

        <div class="py-4">
            <flux:callout variant="warning" icon="information-circle">
                <flux:callout.heading>
                    <p class="text-gray-700">
                        I dati che inserirai non verranno salvati né condivisi. Resteranno solo nella sessione del tuo dispositivo, a meno che tu non scelga volontariamente di condividerli.
                    </p>
                </flux:callout.heading>
            </flux:callout>
        </div>

        <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 mb-6">
            <h2 class="text-sm font-semibold text-gray-500 uppercase mb-2">Un piccolo aiuto in più</h2>
            <p class="text-sm text-gray-700 mb-4">Per proporti suggerimenti più pertinenti e ingredienti stagionali, abbiamo cercato di capire da dove ci stai scrivendo.</p>
            <ul class="text-gray-800 text-sm space-y-1">
                <li>🌍 Papopsi creerà ricette con ingredienti reperibili in: <strong>{{ __("countries.{$requestData->geoData->country}", ['default' => $requestData->geoData->country]) }}</strong></li>
                <li>🕒 Papopsi ti darà una mano con <strong>{{ $this->meal }}</strong></li>
            </ul>
            <p class="text-sm mt-4 text-gray-500">
                Hai notato qualcosa di strano? <a href="mailto:support@papopsi.dev" class="underline hover:text-papopsi-primary">Fammelo sapere!</a>
            </p>
        </div>

        <form wire:submit="startWizard()">
            @csrf
            <div class="py-4">
                <flux:field variant="inline">
                    <flux:checkbox
                        wire:model.live="consent"
                        id="consent"
                        required
                    />
                    <flux:label for="consent" class="text-gray-700">
                        Accetto che i dati vengano usati solo per questa sessione. Nessuna registrazione, nessuna condivisione.
                    </flux:label>
                    <flux:error name="consent" />
                </flux:field>
            </div>
            <button type="submit"
                    @class([
                        "w-full bg-papopsi-primary/40 text-white font-semibold py-3 px-6 rounded-lg transition",
                        "bg-papopsi-primary/90 hover:bg-papopsi-primary cursor-pointer" => $consent,
                    ])
                    @disabled(!$consent)
            >
                Prepariamo {{ $this->meal }}
            </button>
        </form>
    </div>
</div>
