<!-- resources/views/wizard/recipe-not-found.blade.php -->
<div class="max-w-2xl mx-auto px-4 py-12 space-y-10">
    <!-- start: error header -->
    <div class="text-center space-y-4">
        <i data-lucide="help-circle" class="w-12 h-12 mx-auto text-papopsi-highlight"></i>
        <h1 class="text-3xl sm:text-4xl font-bold text-papopsi-highlight">Ops, ricetta non trovata!</h1>
        <p class="text-base sm:text-lg text-papopsi-muted">
            Non siamo riusciti a trovare questa pappa. Forse è scaduta, è stata rimossa oppure non esiste.
        </p>
    </div>
    <!-- end: error header -->

    <!-- start: action buttons -->
    <div class="flex flex-col sm:flex-row justify-center gap-4 text-center">
        <a
            href="{{ route('wizard.intro', ['source' => 'recipe-not-found']) }}"
            class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-full text-sm font-medium bg-papopsi-brand text-white hover:bg-papopsi-brand/90 transition"
        >
            <i data-lucide="home" class="w-4 h-4"></i>
            Torna alla home
        </a>
        <a
            href="{{ config('links.telegram') }}"
            class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-full text-sm font-medium border border-papopsi-muted text-papopsi-muted hover:bg-papopsi-muted/50 transition"
        >
            <i data-lucide="send" class="w-4 h-4"></i>
            Scrivici
        </a>
    </div>
    <!-- end: action buttons -->
</div>
