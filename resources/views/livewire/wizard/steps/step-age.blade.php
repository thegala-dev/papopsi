<div class="max-w-2xl mx-auto px-4 py-12 space-y-8">

    <div class="wizard-card">
        <h1 class="text-3xl font-bold mb-4 text-papopsi-primary">Quanti anni ha il tuo bambino?</h1>

        <p class="text-gray-700 mb-4">
            Scegli la fascia d’età che descrive meglio il momento che sta vivendo. Questo ci aiuterà a proporre
            porzioni, consistenze e ingredienti adatti.
        </p>

        <form method="POST" action="{{ route('wizard.steps.context') }}">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="wizard-card text-left cursor-pointer hover:shadow-lg"
                     wire:click="nextStep('{{ \App\Enums\Wizard\UserProfiles::AGE_6_12->value }}')">
                    <h2 class="text-lg font-semibold text-gray-800">🍼 Inizia lo svezzamento</h2>
                    <p class="text-sm text-gray-600">6–12 mesi: prime pappe, consistenze morbide, introduzione alimenti
                        base.</p>
                </div>

                <div class="wizard-card text-left cursor-pointer hover:shadow-lg"
                     wire:click="nextStep('{{ \App\Enums\Wizard\UserProfiles::AGE_12_24->value }}')">
                    <h2 class="text-lg font-semibold text-gray-800">🦷 Primi dentini e scoperte</h2>
                    <p class="text-sm text-gray-600">12–24 mesi: masticazione, curiosità, inizia a toccare e assaggiare
                        tutto.</p>
                </div>

                <div class="wizard-card text-left cursor-pointer hover:shadow-lg"
                     wire:click="nextStep('{{ \App\Enums\Wizard\UserProfiles::AGE_24_36->value }}')">
                    <h2 class="text-lg font-semibold text-gray-800">🍴 Mangia (quasi) da solo</h2>
                    <p class="text-sm text-gray-600">2–3 anni: inizia a riconoscere cibi, sviluppa preferenze e
                        autonomia.</p>
                </div>

                <div class="wizard-card text-left cursor-pointer hover:shadow-lg"
                     wire:click="nextStep('{{ \App\Enums\Wizard\UserProfiles::AGE_36_60->value }}')">
                    <h2 class="text-lg font-semibold text-gray-800">🧒 Fame da bimbo grande</h2>
                    <p class="text-sm text-gray-600">3–5 anni: pasti più simili ai genitori, nuove consistenze e
                        sapori.</p>
                </div>

                <div class="wizard-card text-left cursor-pointer hover:shadow-lg"
                     wire:click="nextStep('{{ \App\Enums\Wizard\UserProfiles::AGE_60_144->value }}')">
                    <h2 class="text-lg font-semibold text-gray-800">👨‍🍳 Cucina con te!</h2>
                    <p class="text-sm text-gray-600">5+ anni: puoi coinvolgerlo nella preparazione e sperimentare
                        insieme.</p>
                </div>
            </div>
        </form>
    </div>
</div>
