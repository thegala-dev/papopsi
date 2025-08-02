<div class="max-w-3xl mx-auto px-4 py-12 space-y-12">
    <div class="bg-white border border-papopsi-secondary rounded-xl shadow-sm p-6 space-y-6">
        <h1 class="text-3xl font-bold text-papopsi-brand">{{ $recipe->title }}</h1>

        @if($this->recipeLimitReached)
            <div class="bg-papopsi-highlight-20 border-l-4 border-papopsi-highlight p-4 rounded-lg space-y-2">
                <div class="flex items-center gap-2 font-semibold text-papopsi-highlight">
                    <i data-lucide="clock" class="w-5 h-5"></i>
                    Hai raggiunto il limite massimo di ricette per oggi!
                </div>
                <p class="text-sm text-papopsi-highlight">
                    Torna domani per nuove ricette oppure supporta il progetto e sblocca le ricette illimitate!
                </p>
                <div class="flex flex-col sm:flex-row gap-2 mt-2">
                    <a href="{{ config('links.bmac') }}" target="_blank" class="bg-papopsi-brand text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-papopsi-highlight transition">
                        Dona un cucchiaino 🍴
                    </a>
                    <a href="{{ config('links.telegram') }}" class="text-papopsi-brand px-4 py-2 text-sm font-medium rounded-md hover:underline">
                        Scrivici per soluzioni dedicate
                    </a>
                </div>
            </div>
        @endif

        <div class="bg-papopsi-success-50 border-l-4 border-papopsi-success p-4 rounded-lg flex items-start gap-2">
            <i data-lucide="timer" class="w-5 h-5 text-papopsi-success mt-1"></i>
            <p class="text-sm font-semibold text-papopsi-success leading-snug">
                Tempo totale di preparazione: <strong>{{ $recipe->totalTime }}</strong>
            </p>
        </div>

        <p class="text-gray-700 leading-relaxed">{{ $recipe->description }}</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            <div>
                <h2 class="text-lg font-semibold text-papopsi-secondary mb-2">Ingredienti</h2>
                <ul class="list-disc list-inside space-y-1 text-gray-700">
                    @foreach($recipe->ingredients as $ingredient)
                        <li>{{ $ingredient->label }}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                <h2 class="text-lg font-semibold text-papopsi-secondary mb-2">Strumenti</h2>
                <ul class="list-disc list-inside space-y-1 text-gray-700">
                    @foreach($recipe->tools as $tool)
                        <li>{{ $tool->label }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="border-b border-papopsi-secondary"></div>

        <h2 class="text-2xl font-bold text-papopsi-secondary">Procedimento passo passo</h2>

        <div x-data="{ open: null }" class="space-y-4">
            @foreach($recipe->steps as $index => $step)
                <div class="border border-papopsi-muted rounded-lg overflow-hidden">
                    <button
                        type="button"
                        class="w-full text-left px-4 py-3 bg-gray-50 hover:bg-gray-100 cursor-pointer flex items-center justify-between"
                        @click="open === {{ $index }} ? open = null : open = {{ $index }}"
                    >
                        <span class="font-medium text-gray-800">{{ $step->title }}</span>
                        @if($step->time)
                            <span class="text-sm text-gray-500">{{ $step->time }}</span>
                        @endif
                    </button>
                    <div x-show="open === {{ $index }}" x-collapse class="p-4 space-y-4 text-sm text-gray-700">
                        @if(count($step->ingredients))
                            <div>
                                <strong>Ingredienti:</strong>
                                <ul class="list-disc list-inside ml-4">
                                    @foreach($step->ingredients as $ingredient)
                                        <li>{{ $ingredient->label }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(count($step->tools))
                            <div>
                                <strong>Strumenti:</strong>
                                <ul class="list-disc list-inside ml-4">
                                    @foreach($step->tools as $tool)
                                        <li>{{ $tool->label }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div>
                            <strong>Descrizione:</strong>
                            <p class="mt-1">{{ $step->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <livewire:support.share />

    @if(!$this->recipeLimitReached)
        <div class="bg-papopsi-info-50 border-l-4 border-papopsi-info p-4 rounded-lg space-y-2">
            <div class="flex items-center gap-2 font-semibold text-papopsi-info">
                <i data-lucide="info" class="w-5 h-5"></i>
                Hai ancora <span class="font-bold">{{ $this->remainingRecipes }}</span> cucchiaini a disposizione oggi!
            </div>
            <p class="text-sm text-papopsi-info">
                Ogni cucchiaino che prepari con Papopsi è il risultato di tanto amore e un pizzico di tecnologia.
            </p>
            <p class="text-sm text-papopsi-info">
                Se ti va di darci una spinta, puoi offrirci un cucchiaino virtuale o scriverci: ci aiuterai a rendere l’app ancora più utile per tutti!
            </p>
            <div class="flex flex-col sm:flex-row gap-2 mt-2">
                <a href="{{ config('links.bmac') }}" target="_blank" class="bg-papopsi-info-300 hover:bg-papopsi-info-400 text-white px-4 py-2 rounded-md text-sm font-medium transition">
                    Dona un cucchiaino 🍴
                </a>
                <a href="{{ route('wizard.intro', ['source' => 'recipe-view']) }}" class="text-papopsi-info px-4 py-2 text-sm font-medium rounded-md hover:underline">
                    Prepara un'altra ricetta 🍲
                </a>
                <a href="{{ config('links.telegram') }}" class="text-papopsi-info px-4 py-2 text-sm font-medium rounded-md hover:underline">
                    Scrivici per soluzioni dedicate
                </a>
            </div>
        </div>
    @endif
</div>
