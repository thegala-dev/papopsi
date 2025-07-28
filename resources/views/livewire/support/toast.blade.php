<div
    x-data="toastHandler()"
    x-init="Livewire.on('toast.error', data => showToast(data))"
    class="z-50"
>
    <!-- Toast box -->
    <div
        x-show="visible"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        @click.outside="visible = false"
        class="fixed top-24 right-4 w-[350px] max-w-full shadow-lg rounded-xl border-l-4"
        :class="{
            'bg-papopsi-success-50 border-papopsi-success text-papopsi-success': type === 'success',
            'bg-papopsi-highlight-50 border-papopsi-highlight text-papopsi-highlight': type === 'warning',
            'bg-papopsi-danger-50 border-paposi-danger text-papopsi-danger': type === 'danger',
        }"
        style="display: none;"
    >
        <div class="p-4">
            <div class="flex justify-between items-start">
                <div>
                    <h3 class="text-lg font-semibold" x-text="title"></h3>
                    <p class="text-sm mt-1" x-text="message"></p>
                </div>
                <button @click="visible = false" class="text-xl font-bold leading-none hover:opacity-70">
                    ×
                </button>
            </div>

            <div class="mt-4 flex flex-wrap gap-2">
                <template x-if="cta.reloadPage">
                    <a href="{{ request()->getUri() }}" class="px-3 py-1 text-sm font-semibold rounded bg-white border border-current hover:bg-opacity-80">
                        Riprova
                    </a>
                </template>

                <template x-if="cta.mailTo">
                    <a href="mailto:papopsi@thegala.dev" target="_blank" class="ml-auto px-3 py-1 text-sm font-semibold rounded bg-white border border-current hover:bg-opacity-80">
                        Scrivici
                    </a>
                </template>
            </div>
        </div>
    </div>
</div>

@script
<script>
    Alpine.data('toastHandler', () => ({
        visible: false,
        type: 'warning',
        title: '',
        message: '',
        cta: [],
        timeoutId: null,
        listeners: [],
        init() {
            this.listeners.push(
                Livewire.on('show-toast', (options) => {
                    this.showToast(...options);
                })
            );
        },
        destroy() {
            this.listeners.forEach((listener) => {
                listener();
            });
        },
        showToast({ type, title, message, cta }) {
            console.log(cta)
            this.type = (type || 'warning').toLowerCase()
            this.title = title || 'Oops!'
            this.message = message || 'Qualcosa è andato storto'
            this.cta = cta || []
            this.visible = true

            clearTimeout(this.timeoutId)
            this.timeoutId = setTimeout(() => this.visible = false, 6000)
        },
    }));
</script>
@endscript
