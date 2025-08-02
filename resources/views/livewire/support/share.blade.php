<div class="bg-papopsi-muted border border-papopsi-secondary rounded-xl shadow-sm p-4">
    <div>
        <h2 class="text-2xl font-bold text-papopsi-secondary">Hai trovato utile questa pagina?</h2>
        <p class="text-papopsi-muted">Condividila con altri genitori!</p>
    </div>
    <div class="flex flex-col sm:flex-row gap-2 mt-4">
        <button
            wire:click="$js.copyLink"
            class="bg-papopsi-secondary hover:bg-papopsi-secondary text-white px-4 py-2 rounded-md text-sm font-medium transition flex gap-2 items-center"
        >
            <i data-lucide="copy" class="w-4 h-4"></i>
            Copia link
        </button>

        <a
            href="{{$this->shareWaMessage}}"
            target="_blank"
            rel="noopener"
            class="bg-papopsi-secondary hover:bg-papopsi-secondary text-white px-4 py-2 rounded-md text-sm font-medium transition flex gap-2 items-center"
            wire:click="$js.shareWa"
        >
            <i data-lucide="send" class="w-4 h-4"></i>
            Invia su WhatsApp
        </a>
    </div>
</div>

@script
<script>
    $js('copyLink', () => {
        navigator.clipboard.writeText('{{ $this->shareRouteUrl }}').then(() => {
            $wire.dispatch('request-toast', {type: '{{ \App\Enums\Support\ToastType::SUCCESS->name }}', message: 'Link copiato con successo', 'title': 'Horray!'})
            $wire.dispatch('recipeShared', {
                recipe: '{{ $recipe->title }}',
                channel: 'copy-link'
            })
        })
    })
    $js('shareWa', () => {
        navigator.clipboard.writeText('{{ $this->shareRouteUrl }}').then(() => {
            $wire.dispatch('recipeShared', {
                recipe: '{{ $recipe->title }}',
                channel: 'whatsapp',
            })
        })
    })
</script>
@endscript
