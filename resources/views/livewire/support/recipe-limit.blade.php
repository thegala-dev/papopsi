<div class="max-w-2xl mx-auto px-4 py-8 space-y-10">
    <div class="border border-papopsi-secondary p-6 rounded-2xl shadow space-y-10">

        <!-- start: limit reached notice -->
        <div class="space-y-4">
            <h1 class="text-3xl sm:text-4xl font-bold text-papopsi-brand">Stop, cucchiaino esaurito!</h1>
            <p class="text-base sm:text-lg text-papopsi-muted">
                Hai già generato <strong>3 pappe oggi</strong>. Per garantire a tutti un’esperienza leggera e gratuita, impostiamo un piccolo limite giornaliero.
            </p>
        </div>
        <!-- end: limit reached notice -->

        <!-- start: latest recipes -->
        <div class="text-left space-y-4">
            <h2 class="text-lg font-semibold">Le tue ultime pappe</h2>
            <div class="space-y-4">
                @foreach($this->recipes as $recipe)
                    @php /** @var \App\Ai\Recipes\RecipeOutput $recipe */ @endphp
                    <div class="bg-white p-5 rounded-xl shadow space-y-2">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-papopsi-brand">{{ $recipe->title }}</h3>
                            <span class="inline-block bg-papopsi-highlight-100 text-xs font-medium text-papopsi-highlight px-2 py-1 rounded-full">
                                {{ $recipe->duration ?? 'circa 15 min' }}
                            </span>
                        </div>
                        <p class="text-sm text-papopsi-muted">
                            {{ $recipe->description ?? 'Una pappa pensata su misura per il tuo bimbo, equilibrata e semplice da preparare.' }}
                        </p>
                        <div>
                            <a
                                href="{{ route('wizard.recipe.index', ['recipe' => $recipe->slug]) }}"
                                class="text-sm text-papopsi-brand underline hover:no-underline font-medium"
                            >
                                Visualizza
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- end: latest recipes -->

        <!-- start: countdown -->
        <div class="text-center space-y-4">
            <h2 class="text-xl font-semibold">Prossimo cucchiaino disponibile tra</h2>
            <div
                x-data="{
                    seconds: @entangle('remainingSeconds'),
                    formatted() {
                        let h = Math.floor(this.seconds / 3600).toString().padStart(2, '0');
                        let m = Math.floor((this.seconds % 3600) / 60).toString().padStart(2, '0');
                        let s = (this.seconds % 60).toString().padStart(2, '0');
                        return `${h}:${m}:${s}`;
                    }
                }"
                x-init="setInterval(() => { if (seconds > 0) seconds--; }, 1000)"
                class="bg-white text-papopsi-brand font-mono text-4xl py-6 rounded-lg shadow"
            >
                <span x-text="formatted()"></span>
            </div>
        </div>
        <!-- end: countdown -->

        <!-- start: support section -->
        <div class="text-center text-papopsi-muted space-y-6">
            <p class="text-base sm:text-lg">
                Dietro Papopsi c'è un progetto indipendente, gratuito e pensato per tutti.<br class="hidden sm:inline">
                Se vuoi darci una mano a farlo crescere, ecco come puoi aiutarci:
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a
                    href="https://coff.ee/thegaladev"
                    target="_blank"
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-papopsi-highlight-100 text-papopsi-highlight text-sm font-semibold hover:bg-papopsi-highlight-200 transition"
                >
                    <i data-lucide="coffee"></i> Dona un cucchiaino
                </a>
                <a
                    href="mailto:ciao@papopsi.it"
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-full border border-papopsi-muted text-papopsi-muted text-sm font-semibold hover:bg-papopsi-muted/50 transition"
                >
                    <i data-lucide="mail"></i> Scrivici
                </a>
            </div>
        </div>
        <!-- end: support section -->

    </div>
</div>
