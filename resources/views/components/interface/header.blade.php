<header class="bg-papopsi-muted sticky top-0 z-30 border-b border-gray-200 shadow-sm">
    <div class="max-w-4xl mx-auto px-4 py-3 flex items-center justify-between">
        <a href="{{ route('home') }}" class="text-xl font-bold text-papopsi-brand flex items-center gap-2">
            <i data-lucide="baby"></i>
            Papopsi
        </a>
        <a
            href="{{ route('wizard.intro', ['source' => 'header']) }}"
            class="text-sm font-semibold text-white bg-papopsi-brand px-4 py-2 rounded-full hover:bg-papopsi-brand/90 transition flex items-center gap-2"
        >
            <i data-lucide="chef-hat"></i>
            Prepara la pappa
        </a>
    </div>
</header>
