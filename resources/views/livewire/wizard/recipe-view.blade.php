<div class="max-w-3xl mx-auto px-4 py-12 space-y-12">
    <div class="wizard-card">
        <h1 class="text-4xl font-bold mb-4 text-papopsi-primary">{{ $recipe->title }}</h1>

        <div class="flex flex-col gap-2">
            @if($this->recipeLimitReached)
                <flux:callout variant="warning" icon="clock">
                    <flux:callout.heading>
                        Hai raggiunto il limite massimo di ricette per oggi!
                    </flux:callout.heading>
                    <flux:callout.text>Torna domani per poter creare delle nuove ricette, oppure supporta il progetto e sblocca le ricette illimitate!</flux:callout.text>
                    <x-slot name="actions">
                        <flux:button href="https://coff.ee/thegaladev" target="_blank">Dona un cucchiaino 🍴</flux:button>
                        <flux:button variant="ghost" href="mailto:ciao@papopsi.it">Scrivici per soluzioni dedicate</flux:button>
                    </x-slot>
                </flux:callout>
            @endif

            <flux:callout variant="success" icon="clock">
                <flux:callout.heading>
                    Tempo totale di preparazione: <strong>{{ $recipe->totalTime }}</strong>
                </flux:callout.heading>
            </flux:callout>
        </div>

        <p class="text-gray-700 leading-relaxed mt-6">{{ $recipe->description }}</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 mt-10">
            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Ingredienti</h2>
                <ul class="list-disc list-inside space-y-1 text-gray-700">
                    @foreach($recipe->ingredients as $ingredient)
                        <li>{{ $ingredient->label }}</li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h2 class="text-lg font-semibold text-gray-800 mb-2">Strumenti</h2>
                <ul class="list-disc list-inside space-y-1 text-gray-700">
                    @foreach($recipe->tools as $tool)
                        <li>{{ $tool->label }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="wizard-card">
        <h2 class="text-2xl font-bold mb-6 text-papopsi-primary">Procedimento passo passo</h2>

        <div x-data="{ open: null }" class="space-y-4">
            @foreach($recipe->steps as $index => $step)
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button
                        type="button"
                        class="w-full text-left px-4 py-3 bg-gray-100 hover:bg-gray-200 flex items-center justify-between"
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

    <div class="wizard-card space-y-4">
        <flux:button class="w-full" icon="bookmark" variant="outline">
            Salva la ricetta
        </flux:button>

        <flux:button class="w-full" icon="share">
            Condividi la ricetta
        </flux:button>
    </div>

    @if(!$this->recipeLimitReached)
        <flux:callout icon="information-circle">
            <flux:callout.heading>
                <p class="text-gray-900">Hai ancora <span class="font-bold">{{ $this->remainingRecipes }}</span> cucchiaini a disposizione oggi!</p>
            </flux:callout.heading>
            <flux:callout.text>
                <p class="text-gray-700 mb-2">Ogni cucchiaino che prepari con Papopsi è il risultato di tanto amore e un pizzico di tecnologia.</p>
                <p class="text-gray-700">Se ti va di darci una spinta, puoi offrirci un cucchiaino virtuale o scriverci: ci aiuterai a rendere l’app ancora più utile per tutti!</p>
            </flux:callout.text>
            <x-slot name="actions">
                <flux:button href="https://coff.ee/thegaladev" target="_blank">Dona un cucchiaino 🍴</flux:button>
                <flux:button href="{{ route('wizard.intro') }}">Prepara un'altra ricetta 🍲</flux:button>
                <flux:button variant="ghost" href="mailto:ciao@papopsi.it">Scrivici per soluzioni dedicate</flux:button>
            </x-slot>
        </flux:callout>
    @endif
</div>
