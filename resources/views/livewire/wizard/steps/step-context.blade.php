<div class="max-w-2xl mx-auto px-4 py-12 space-y-8">
    <div class="bg-white border border-papopsi-secondary rounded-xl shadow-sm p-6">
        <h1 class="text-3xl font-bold mb-4 text-papopsi-brand">Parlaci un po' di te</h1>

        <p class="text-gray-700 mb-4">
            Papopsi tiene conto di dove vivi, di cosa preferisci e del tempo che hai.
            Clicca sulle parole evidenziate per raccontargli meglio la tua giornata.
        </p>

        <div class="flex flex-wrap text-gray-800 text-xl italic gap-1 leading-relaxed">

            <span>Abito</span>

            <span x-data="{ edit: false }" class="relative">
                <span x-show="!edit" @click="edit = true" class="font-semibold text-papopsi-info hover:underline hover:text-papopsi-success cursor-pointer">
                    {{ $this->zoneLocalized }}
                </span>
                <select x-show="edit" x-transition @change="edit = false" wire:model.live="zone"
                        class="text-base mt-1 bg-white border border-papopsi-success rounded-md py-1 px-2 text-papopsi-muted shadow-sm">
                    <option value="" disabled>Seleziona zona</option>
                    @foreach($this->zones as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </span>

            <span>, prediligo</span>

            <span x-data="{ edit: false }" class="relative">
                <span x-show="!edit" @click="edit = true" class="font-semibold text-papopsi-info hover:underline hover:text-papopsi-success cursor-pointer">
                    {{ $this->preferenceLocalized }}
                </span>
                <select x-show="edit" x-transition @change="edit = false" wire:model.live="preference"
                        class="text-base mt-1 bg-white border border-papopsi-success rounded-md py-1 px-2 text-papopsi-muted shadow-sm">
                    <option value="" disabled>Seleziona preferenza</option>
                    @foreach($this->preferences as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </span>

            <span>, ho</span>

            <span x-data="{ edit: false }" class="relative">
                <span x-show="!edit" @click="edit = true" class="font-semibold text-papopsi-info hover:underline hover:text-papopsi-success cursor-pointer">
                    {{ $this->timeLocalized }}
                </span>
                <select x-show="edit" x-transition @change="edit = false" wire:model.live="time"
                        class="text-base mt-1 bg-white border border-papopsi-success rounded-md py-1 px-2 text-papopsi-muted shadow-sm">
                    <option value="" disabled>Quanto tempo hai?</option>
                    @foreach($this->times as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </span>

            <span>per cucinare. La mia cucina è</span>

            <span x-data="{ edit: false }" class="relative">
                <span x-show="!edit" @click="edit = true" class="font-semibold text-papopsi-info hover:underline hover:text-papopsi-success cursor-pointer">
                    {{ $this->kitchenLocalized }}
                </span>
                <select x-show="edit" x-transition @change="edit = false" wire:model.live="kitchen"
                        class="text-base mt-1 bg-white border border-papopsi-success rounded-md py-1 px-2 text-papopsi-muted shadow-sm">
                    <option value="" disabled>Tipo di cucina</option>
                    @foreach($this->kitchens as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </span>

            <span>e</span>

            <span x-data="{ edit: false }" class="relative">
                <span x-show="!edit" @click="edit = true" class="font-semibold text-papopsi-info hover:underline hover:text-papopsi-success cursor-pointer">
                    {{ $this->experienceLocalized }}
                </span>
                <select x-show="edit" x-transition @change="edit = false" wire:model.live="experience"
                        class="text-base mt-1 bg-white border border-papopsi-success rounded-md py-1 px-2 text-papopsi-muted shadow-sm">
                    <option value="" disabled>Livello esperienza</option>
                    @foreach($this->experiences as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </span>
        </div>

        <form wire:submit="nextStep">
            @csrf
            <button type="submit" class="mt-8 w-full bg-white text-papopsi-brand border border-papopsi-brand font-semibold py-3 px-6 rounded-lg hover:bg-papopsi-brand hover:text-white transition">
                <div class="flex justify-center items-center gap-2">
                    <svg wire:loading wire:target="nextStep" class="animate-spin h-5 w-5 text-papopsi-brand" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
                    </svg>
                    <span wire:loading wire:target="nextStep">Papopsi sta pensando...</span>
                    <span wire:loading.remove wire:target="nextStep">Continua</span>
                </div>
            </button>
        </form>

        <p class="text-gray-700 text-xs mt-4">
            <strong>Nota:</strong> nei prossimi passaggi potrai modificare anche ingredienti e strumenti disponibili.
        </p>
    </div>
</div>
