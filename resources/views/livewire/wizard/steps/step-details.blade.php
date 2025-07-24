<div class="max-w-2xl mx-auto px-4 py-12 space-y-8">
    <div class="wizard-card">
        <h1 class="text-3xl font-bold mb-4 text-papopsi-primary">Ingredienti e strumenti</h1>
        <p class="text-gray-700 mb-6">Controlla se le nostre ipotesi sono corrette. Puoi deselezionare ciò che non hai o riformulare i suggerimenti.</p>

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Ingredienti stimati</h2>
            <flux:icon icon="arrow-path" class="size-4 text-gray-600 hover:text-papopsi-primary" wire:click="reloadIngredients" />
        </div>
        <div class="flex w-full justify-items-center space-y-2 pb-6" wire:loading wire:target="reloadIngredients">
            <flux:icon.loading class="text-papopsi-primary" />
            <span class="text-papopsi-primary">Papopsi sta cercando nuovi ingredienti</span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6" wire:loading.remove wire:target="reloadIngredients">
            @foreach($this->selectedIngredients as $key => $ingredient)
                <flux:callout
                    :icon="$this->hasIngredient($ingredient->slug) ? 'plus-circle' : 'minus-circle'"
                    :variant="$this->hasIngredient($ingredient->slug) ? 'secondary' : 'danger'"
                    wire:click.prevent="toggleIngredient('{{ $ingredient->slug }}')"
                    inline
                    wire:key="ingredients-{{$key}}"
                >
                    <flux:callout.heading>{{ $ingredient->label }}</flux:callout.heading>
                </flux:callout>
            @endforeach
        </div>

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800 mb-2">Strumenti disponibili</h2>
            <flux:icon icon="arrow-path" class="size-4 text-gray-600 hover:text-papopsi-primary" wire:click="reloadTools" />
        </div>
        <div class="flex w-full justify-items-center space-y-2 pb-6" wire:loading wire:target="reloadTools">
            <flux:icon.loading class="text-papopsi-primary" />
            <span class="text-papopsi-primary">Papopsi sta cercando nuovi strumenti</span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6" wire:loading.remove wire:target="reloadTools">
            @foreach($this->selectedTools as $key => $tool)
                <flux:callout
                    :icon="$this->hasTool($tool->slug) ? 'plus-circle' : 'minus-circle'"
                    :variant="$this->hasTool($tool->slug) ? 'secondary' : 'danger'"
                    wire:click.prevent="toggleTool('{{ $tool->slug }}')"
                    inline
                    wire:key="tools-{{$key}}"
                >
                    <flux:callout.heading>{{ $tool->label }} @if($tool->optional)(opzionale)@endif</flux:callout.heading>
                    @if($tool->notes)
                        <flux:callout.text>{{ $tool->notes }}</flux:callout.text>
                    @endif
                </flux:callout>
            @endforeach
        </div>

        <form wire:submit="nextStep()">
            @csrf
            <button type="submit" class="w-full bg-white text-papopsi-primary border border-papopsi-primary font-semibold py-3 px-6 rounded-lg hover:bg-papopsi-primary hover:text-white transition">
                Ho revisionato, continua
            </button>
        </form>
    </div>
</div>
