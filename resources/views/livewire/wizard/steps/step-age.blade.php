<div class="max-w-2xl mx-auto px-4 py-12 space-y-8">
    <div class="bg-white border border-papopsi-secondary rounded-xl shadow-sm p-6">
        <!-- start: header -->
        <h1 class="text-3xl font-bold mb-4 text-papopsi-brand">Quanti anni ha il tuo bambino?</h1>
        <p class="text-gray-700 mb-4">
            Scegli la fascia d’età che descrive meglio il momento che sta vivendo. Questo ci aiuterà a proporre
            porzioni, consistenze e ingredienti adatti.
        </p>
        <!-- end: header -->

        <!-- start: age grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- start: age 6-12 -->
            <div class="cursor-pointer border hover:border-2 border-papopsi-secondary rounded-xl p-4 flex flex-col gap-2 shadow-sm hover:shadow-lg transition"
                 wire:click="nextStep('{{ \App\Enums\Wizard\UserProfiles::AGE_6_12->value }}')">
                <div class="flex items-center gap-2 text-papopsi-success">
                    <i data-lucide="baby" class="w-5 h-5"></i>
                    <h2 class="text-lg font-semibold">Inizia lo svezzamento</h2>
                </div>
                <p class="text-sm text-gray-600">6–12 mesi: prime pappe, consistenze morbide, introduzione alimenti base.</p>
            </div>
            <!-- end: age 6-12 -->

            <!-- start: age 12-24 -->
            <div class="cursor-pointer border hover:border-2 border-papopsi-secondary focus:ring-papopsi-secondary rounded-xl p-4 flex flex-col gap-2 shadow-sm hover:shadow-lg transition"
                 wire:click="nextStep('{{ \App\Enums\Wizard\UserProfiles::AGE_12_24->value }}')">
                <div class="flex items-center gap-2 text-papopsi-success">
                    <i data-lucide="smile" class="w-5 h-5"></i>
                    <h2 class="text-lg font-semibold">Primi dentini e scoperte</h2>
                </div>
                <p class="text-sm text-gray-600">12–24 mesi: masticazione, curiosità, inizia a toccare e assaggiare tutto.</p>
            </div>
            <!-- end: age 12-24 -->

            <!-- start: age 24-36 -->
            <div class="cursor-pointer border hover:border-2 border-papopsi-secondary focus:ring-papopsi-secondary rounded-xl p-4 flex flex-col gap-2 shadow-sm hover:shadow-lg transition"
                 wire:click="nextStep('{{ \App\Enums\Wizard\UserProfiles::AGE_24_36->value }}')">
                <div class="flex items-center gap-2 text-papopsi-success">
                    <i data-lucide="utensils" class="w-5 h-5"></i>
                    <h2 class="text-lg font-semibold">Mangia (quasi) da solo</h2>
                </div>
                <p class="text-sm text-gray-600">2–3 anni: inizia a riconoscere cibi, sviluppa preferenze e autonomia.</p>
            </div>
            <!-- end: age 24-36 -->

            <!-- start: age 36-60 -->
            <div class="cursor-pointer border hover:border-2 border-papopsi-secondary focus:ring-papopsi-secondary rounded-xl p-4 flex flex-col gap-2 shadow-sm hover:shadow-lg transition"
                 wire:click="nextStep('{{ \App\Enums\Wizard\UserProfiles::AGE_36_60->value }}')">
                <div class="flex items-center gap-2 text-papopsi-success">
                    <i data-lucide="user" class="w-5 h-5"></i>
                    <h2 class="text-lg font-semibold">Fame da bimbo grande</h2>
                </div>
                <p class="text-sm text-gray-600">3–5 anni: pasti più simili ai genitori, nuove consistenze e sapori.</p>
            </div>
            <!-- end: age 36-60 -->

            <!-- start: age 60-144 -->
            <div class="cursor-pointer border hover:border-2 border-papopsi-secondary focus:ring-papopsi-secondary rounded-xl p-4 flex flex-col gap-2 shadow-sm hover:shadow-lg transition"
                 wire:click="nextStep('{{ \App\Enums\Wizard\UserProfiles::AGE_60_144->value }}')">
                <div class="flex items-center gap-2 text-papopsi-success">
                    <i data-lucide="chef-hat" class="w-5 h-5"></i>
                    <h2 class="text-lg font-semibold">Cucina con te!</h2>
                </div>
                <p class="text-sm text-gray-600">5+ anni: puoi coinvolgerlo nella preparazione e sperimentare insieme.</p>
            </div>
            <!-- end: age 60-144 -->
        </div>
        <!-- end: age grid -->
    </div>
</div>
