@php /** @var \App\ValueObjects\Account\TierCookie $cookie */ @endphp
<div class="max-w-2xl mx-auto px-4 py-4 space-y-8">
    <div class="bg-white border border-papopsi-secondary rounded-xl shadow-sm p-6 space-y-12">
        <div class="text-center space-y-4">
            <h1 class="text-4xl sm:text-5xl font-bold text-papopsi-primary">Grazie di cuore! ❤️</h1>
            <p class="text-base sm:text-lg text-gray-700">
                Il tuo supporto ci permette di continuare a rendere Papopsi gratuito e accessibile per tutti i genitori.
            </p>
        </div>

        <div class="bg-papopsi-muted rounded-xl p-6 space-y-4">
            <h2 class="text-2xl font-semibold text-papopsi-text">Perché Papopsi?</h2>
            <p class="text-gray-700 text-base sm:text-lg">
                Dietro Papopsi c'è un'idea semplice: <strong>ogni genitore merita supporto, tempo e serenità</strong> quando si tratta di nutrire un bimbo.
                Questo progetto è nato per aiutare, non per vendere: ogni contributo ci avvicina a una piattaforma sempre più utile, inclusiva e curata.
            </p>
        </div>

        <div class="bg-papopsi-info-50 border border-papopsi-info rounded-xl p-6 space-y-4">
            <h2 class="text-2xl font-semibold text-papopsi-info">Cosa hai appena sbloccato?</h2>
            <ul class="list-disc list-inside space-y-2 text-gray-800">
                <li><span class="font-bold text-papopsi-info">{{ $cookie->maxRecipes() }}</span> ricette disponibili al giorno</li>
                <li>Valide per <span class="font-bold text-papopsi-info">{{ $cookie->expiration() }}</span> giorni a partire da oggi</li>
                <li>Accesso prioritario alle nuove funzionalità in arrivo</li>
                <li>Un posto nel nostro cuore ❤️</li>
            </ul>
        </div>

        <div class="text-center">
            <a href="/wizard" class="btn-pill bg-papopsi-primary text-white hover:bg-papopsi-primary/90 transition">
                Inizia a preparare la pappa
            </a>
        </div>

        <div class="text-center text-sm text-gray-600">
            <p>
                Aiutaci a far conoscere Papopsi! Condividi il sito con chi potrebbe averne bisogno oppure <a href="{{ config('links.telegram') }}" class="underline text-papopsi-primary">scrivici</a> per feedback, idee o semplicemente per raccontarci la tua esperienza.
            </p>
        </div>
    </div>
</div>
