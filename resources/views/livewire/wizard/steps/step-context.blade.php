<div class="max-w-2xl mx-auto px-4 py-12 space-y-8">
    <div class="wizard-card">
        <h1 class="text-3xl font-bold mb-4 text-papopsi-primary">Parlaci un po' di te</h1>

        <p class="text-gray-700 mb-4">
            La ricetta che ti proporrà Papopsi tiene conto del tuo stile di vita, della disponibilità degli ingredienti dove vivi e del tempo che puoi dedicare alla cucina.
        </p>
        <p class="text-gray-700 mb-4">
            Clicca sulle parole in grassetto per modificare la frase.
        </p>

        <div class="flex flex-wrap text-gray-900 text-xl italic gap-1">
            <span>Abito</span>
            <flux:modal.trigger name="edit-zone">
                <span class="font-medium hover:text-papopsi-primary cursor-pointer"><strong>{{ $this->zoneLocalized }}</strong></span>
            </flux:modal.trigger>
            <span>, prediligo</span>
            <flux:modal.trigger name="edit-preference">
                <span class="font-medium hover:text-papopsi-primary cursor-pointer"><strong>{{ $this->preferenceLocalized }}</strong></span>
            </flux:modal.trigger>
            <span>, ho</span>
            <flux:modal.trigger name="edit-time">
                <span class="font-medium hover:text-papopsi-primary cursor-pointer"><strong>{{ $this->timeLocalized }}</strong></span>
            </flux:modal.trigger>
            <span>per cucinare. La mia cucina è</span>
            <flux:modal.trigger name="edit-kitchen">
                <span class="font-medium hover:text-papopsi-primary cursor-pointer"><strong>{{ $this->kitchenLocalized }}</strong></span>
            </flux:modal.trigger>
            <span>e </span>
            <flux:modal.trigger name="edit-experience">
                <span class="font-medium hover:text-papopsi-primary cursor-pointer"><strong>{{ $this->experienceLocalized }}</strong></span>
            </flux:modal.trigger>
        </div>

        <form wire:submit="nextStep">
            @csrf
            <button type="submit" class="mt-8 w-full bg-papopsi-primary/40 text-white font-semibold py-3 px-6 rounded-lg hover:bg-papopsi-primary transition">
                Continua
            </button>
        </form>

        <p class="text-gray-700 text-xs mt-4">
            <strong>Nota:</strong> nei prossimi passaggi potrai modificare anche ingredienti e strumenti disponibili.
        </p>
    </div>

    {{-- Modale ZONA --}}
    <flux:modal name="edit-zone" class="bg-white md:w-96">
        <div class="space-y-6">
            <flux:heading size="lg">Dove vivi?</flux:heading>
            <flux:text class="mt-2">
                Sapere il contesto abitativo ci aiuta a immaginare quali ingredienti puoi trovare più facilmente: al supermercato, dal fruttivendolo o magari da un contadino vicino casa.
            </flux:text>
            <flux:select wire:model.live="zone" placeholder="Seleziona la zona">
                @foreach($this->zones as $key => $value)
                    <flux:select.option value="{{ $key }}">{{ $value }}</flux:select.option>
                @endforeach
            </flux:select>
            <div class="flex">
                <flux:spacer />
                <flux:button x-on:click="$flux.modal('edit-zone').close()">Salva</flux:button>
            </div>
        </div>
    </flux:modal>

    {{-- Modale PREFERENZA PASTI --}}
    <flux:modal name="edit-preference" class="bg-white md:w-96">
        <div class="space-y-6">
            <flux:heading size="lg">Che tipo di pasti preferisci?</flux:heading>
            <flux:text class="mt-2">
                Questa preferenza ci aiuta a capire se proponere piatti molto semplici o qualcosa di più variegato e completo.
            </flux:text>
            <flux:select wire:model.live="preference" placeholder="Seleziona una preferenza">
                @foreach($this->preferences as $key => $value)
                    <flux:select.option value="{{ $key }}">{{ $value }}</flux:select.option>
                @endforeach
            </flux:select>
            <div class="flex">
                <flux:spacer />
                <flux:button x-on:click="$flux.modal('edit-preference').close()">Salva</flux:button>
            </div>
        </div>
    </flux:modal>

    {{-- Modale TEMPO --}}
    <flux:modal name="edit-time" class="bg-white md:w-96">
        <div class="space-y-6">
            <flux:heading size="lg">Quanto tempo hai?</flux:heading>
            <flux:text class="mt-2">
                Più tempo hai, più possiamo proporti piatti articolati. Se hai fretta, andremo subito al sodo.
            </flux:text>
            <flux:select wire:model.live="time" placeholder="Seleziona quanto tempo hai">
                @foreach($this->times as $key => $value)
                    <flux:select.option value="{{ $key }}">{{ $value }}</flux:select.option>
                @endforeach
            </flux:select>
            <div class="flex">
                <flux:spacer />
                <flux:button x-on:click="$flux.modal('edit-time').close()">Salva</flux:button>
            </div>
        </div>
    </flux:modal>

    {{-- Modale CUCINA --}}
    <flux:modal name="edit-kitchen" class="bg-white md:w-96">
        <div class="space-y-6">
            <flux:heading size="lg">Com'è la tua cucina?</flux:heading>
            <flux:text class="mt-2">
                La disponibilità di strumenti influisce su come vengono preparati gli alimenti: cottura a vapore, frullati, tagli grossolani…
            </flux:text>
            <flux:select wire:model.live="kitchen" placeholder="Seleziona il tipo di cucina">
                @foreach($this->kitchens as $key => $value)
                    <flux:select.option value="{{ $key }}">{{ $value }}</flux:select.option>
                @endforeach
            </flux:select>
            <div class="flex">
                <flux:spacer />
                <flux:button x-on:click="$flux.modal('edit-kitchen').close()">Salva</flux:button>
            </div>
        </div>
    </flux:modal>

    {{-- Modale ESPERIENZA --}}
    <flux:modal name="edit-experience" class="bg-white md:w-96">
        <div class="space-y-6">
            <flux:heading size="lg">Quanto te la cavi ai fornelli?</flux:heading>
            <flux:text class="mt-2">
                La tua esperienza ai fornelli ci aiuta a scegliere ricette che non ti mettano in difficoltà, ma che ti facciano anche sentire a tuo agio.
            </flux:text>
            <flux:select wire:model.live="experience" placeholder="Seleziona la tua esperienza">
                @foreach($this->experiences as $key => $value)
                    <flux:select.option value="{{ $key }}">{{ $value }}</flux:select.option>
                @endforeach
            </flux:select>
            <div class="flex">
                <flux:spacer />
                <flux:button x-on:click="$flux.modal('edit-experience').close()">Salva</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
