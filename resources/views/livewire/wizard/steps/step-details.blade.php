<div class="max-w-2xl mx-auto px-4 py-12 space-y-8">
    <div class="wizard-card">
        <h1 class="text-3xl font-bold mb-4 text-papopsi-primary">Ingredienti e strumenti</h1>
        <p class="text-gray-700 mb-6">Controlla se le nostre ipotesi sono corrette. Puoi deselezionare ciò che non hai o riformulare i suggerimenti.</p>

        <h2 class="text-lg font-semibold text-gray-800 mb-2">Ingredienti stimati</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
            <!-- ingredient cards -->
        </div>

        <h2 class="text-lg font-semibold text-gray-800 mb-2">Strumenti disponibili</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
            <!-- tool cards -->
        </div>

        <form method="POST" action="{{ route('wizard.steps.summary') }}">
            @csrf
            <button type="submit" class="w-full bg-papopsi-primary/40 text-white font-semibold py-3 px-6 rounded-lg hover:bg-papopsi-primary transition">
                Ho revisionato, continua
            </button>
        </form>
    </div>
</div>
