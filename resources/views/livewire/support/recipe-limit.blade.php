<div class="max-w-2xl mx-auto px-4 py-8 space-y-10">
    <div class="wizard-card space-y-8">
        <div class="space-y-4">
            <h1 class="text-3xl sm:text-4xl font-bold text-papopsi-primary">Stop, cucchiaino esaurito!</h1>
            <p class="mt-4 text-base sm:text-lg text-gray-700">
                Hai già generato <strong>3 pappe oggi</strong>. Per garantire a tutti un’esperienza leggera e gratuita, impostiamo un piccolo limite giornaliero.
            </p>
        </div>

        <div class="text-left">
            <h2 class="text-lg font-semibold mb-4">Le tue ultime pappe</h2>
            <div class="space-y-4">
                @foreach($this->recipes as $recipe)
                    @php /** @var \App\Ai\Recipes\RecipeOutput $recipe */ @endphp
                    <div class="bg-white p-5 rounded-xl shadow flex flex-col gap-2">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-papopsi-primary">{{ $recipe->title }}</h3>
                            <span class="inline-block bg-papopsi-muted text-xs font-medium text-gray-700 px-2 py-1 rounded-full">
                                {{ $recipe->duration ?? 'circa 15 min' }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-700">
                            {{ $recipe->description ?? 'Una pappa pensata su misura per il tuo bimbo, equilibrata e semplice da preparare.' }}
                        </p>
                        <div>
                            <a
                                href="{{ route('wizard.recipe.index', ['recipe' => $recipe->slug]) }}"
                                class="text-sm text-papopsi-primary underline hover:no-underline font-medium"
                            >
                                Visualizza
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="text-center">
            <h2 class="text-xl font-semibold mb-4">Prossimo cucchiaino disponibile tra</h2>
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
                class="bg-papopsi-muted text-papopsi-primary font-mono text-4xl py-6 rounded-lg"
            >
                <span x-text="formatted()"></span>
            </div>
        </div>

        <div class="text-center text-gray-700">
            <p class="text-base sm:text-lg">
                Dietro Papopsi c’è un progetto indipendente, gratuito e pensato per tutti.<br class="hidden sm:inline"> Se vuoi darci una mano a farlo crescere, ecco come puoi aiutarci:
            </p>
            <div class="mt-6 flex flex-col sm:flex-row justify-center gap-4">
                <a
                    href="https://coff.ee/thegaladev"
                    target="_blank"
                    class="btn-pill bg-papopsi-muted text-papopsi-primary hover:bg-papopsi-muted/90 transition"
                >
                    Dona un cucchiaino 🍴
                </a>
                <a
                    href="mailto:ciao@papopsi.it"
                    class="btn-pill border border-papopsi-muted text-papopsi-text hover:bg-papopsi-muted/50 transition"
                >
                    Scrivici
                </a>
            </div>
        </div>
    </div>
</div>
