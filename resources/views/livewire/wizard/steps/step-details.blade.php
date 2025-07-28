<div class="bg-papopsi-muted max-w-2xl mx-auto px-4 py-12 space-y-8">
    <div class="bg-white border border-papopsi-muted rounded-xl shadow-sm p-6">
        <h1 class="text-3xl font-bold mb-4 text-papopsi-brand">Ingredienti e strumenti</h1>
        <p class="text-gray-700 mb-6">
            Controlla se le nostre ipotesi sono corrette. Puoi deselezionare ciò che non hai o riformulare i suggerimenti.
        </p>

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Ingredienti stimati</h2>
            <i data-lucide="refresh-cw" class="w-4 h-4 text-gray-600 hover:text-papopsi-brand cursor-pointer" wire:click="reloadIngredients"></i>
        </div>

        <div class="flex w-full justify-center items-center gap-2 pb-6" wire:loading wire:target="reloadIngredients">
            <i data-lucide="loader" class="animate-spin text-papopsi-brand"></i>
            <span class="text-papopsi-brand">Papopsi sta cercando nuovi ingredienti</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6" wire:loading.remove wire:target="reloadIngredients">
            @foreach($this->selectedIngredients as $key => $ingredient)
                <div
                    @class([
    'flex items-start gap-3 p-4 border rounded-lg cursor-pointer transition hover:shadow-md',
    'border-papopsi-success bg-papopsi-white' => $this->hasIngredient($ingredient->slug),
    'border-papopsi-danger bg-red-50' => !$this->hasIngredient($ingredient->slug),
])
                    wire:click.prevent="toggleIngredient('{{ $ingredient->slug }}')"
                    wire:key="ingredients-{{$key}}">
                    <i data-lucide="{{ $this->hasIngredient($ingredient->slug) ? 'check-circle' : 'x-circle' }}"
                        @class([
        'w-5 h-5 mt-1 shrink-0',
        'text-papopsi-success' => $this->hasIngredient($ingredient->slug),
        'text-papopsi-danger' => !$this->hasIngredient($ingredient->slug),
    ])></i>
                    <div class="text-sm text-gray-900">{{ $ingredient->label }}</div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Strumenti disponibili</h2>
            <i data-lucide="refresh-cw" class="w-4 h-4 text-gray-600 hover:text-papopsi-brand cursor-pointer" wire:click="reloadTools"></i>
        </div>

        <div class="flex w-full justify-center items-center gap-2 pb-6" wire:loading wire:target="reloadTools">
            <i data-lucide="loader" class="animate-spin text-papopsi-brand"></i>
            <span class="text-papopsi-brand">Papopsi sta cercando nuovi strumenti</span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6" wire:loading.remove wire:target="reloadTools">
            @foreach($this->selectedTools as $key => $tool)
                <div
                    @class([
    'flex items-start gap-3 p-4 border rounded-lg cursor-pointer transition hover:shadow-md',
    'border-papopsi-success bg-papopsi-white' => $this->hasTool($tool->slug),
    'border-papopsi-danger bg-red-50' => !$this->hasTool($tool->slug),
])
                    wire:click.prevent="toggleTool('{{ $tool->slug }}')"
                    wire:key="tools-{{$key}}">
                    <i data-lucide="{{ $this->hasTool($tool->slug) ? 'check-circle' : 'x-circle' }}"
                        @class([
        'w-5 h-5 mt-1 shrink-0',
        'text-papopsi-success' => $this->hasTool($tool->slug),
        'text-papopsi-danger' => !$this->hasTool($tool->slug),
    ])></i>
                    <div class="text-sm text-gray-900">
                        {{ $tool->label }}
                        @if($tool->optional)
                            <span class="text-xs text-gray-500">(opzionale)</span>
                        @endif
                        @if($tool->notes)
                            <div class="text-xs text-gray-600 mt-1">{{ $tool->notes }}</div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <form wire:submit="nextStep">
            @csrf
            <button type="submit" class="w-full bg-white text-papopsi-brand border border-papopsi-brand font-semibold py-3 px-6 rounded-lg hover:bg-papopsi-brand hover:text-white transition">
                Ho revisionato, continua
            </button>
        </form>
    </div>
</div>
