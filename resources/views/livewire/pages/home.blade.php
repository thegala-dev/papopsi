<main>
    <!-- start: hero -->
    <section class="min-h-[70vh] flex flex-col justify-center items-center text-center px-6 py-16 bg-papopsi-muted">
        <h1 class="text-4xl font-bold max-w-2xl leading-tight text-papopsi-muted">
            Dimentica <span class="text-papopsi-brand">Google</span><br/> C'è <span class="text-papopsi-brand font-extrabold">Papopsi</span>
        </h1>
        <h2 class="mt-4 text-xl font-bold text-papopsi-muted tracking-wide">Un alleato in cucina per preparare <span class="text-papopsi-brand">pappe sane, veloci e senza stress</span>.</h2>
        <p class="max-w-xl text-center text-base mt-6">Più rapido di una ricerca, più affidabile di una suocera.</p>
        <a
            href="{{ route('wizard.intro', ['source' => 'hero']) }}"
            class="text-sm font-semibold text-white bg-papopsi-brand mt-8 px-4 py-2 rounded-full hover:shadow-md transition flex items-center gap-2"
        >
            <i data-lucide="chef-hat"></i>
            Prepara la pappa
        </a>
    </section>
    <!-- end: hero -->

    <!-- start: about Papopsi -->
    <section class="px-6 py-12 bg-papopsi-highlight-200 text-center">
        <div class="flex flex-col max-w-xl mx-auto">
            <div>
                <h2 class="text-2xl font-bold text-papopsi-muted mb-6">Cos'è Papopsi</h2>

                <p class="max-w-xl mx-auto text-base leading-relaxed mt-4">
                    Sono anche io un genitore. Quando ho iniziato lo svezzamento di mio figlio mi sono trovato davanti a mille blog, libri di esperti e consigli non richiesti... e zero tempo per fare tutto.<br/>
                    Così, invece di perdermi tra ricerche infinite, ho deciso di creare lo strumento che avrei voluto avere: semplice, affidabile e fatto per noi genitori.
                </p>
                <p class="max-w-xl mx-auto text-base leading-relaxed mt-4">
                    Papopsi è il tuo alleato in cucina: un wizard facile e veloce che trasforma quello che hai in casa in ricette adatte al tuo bimbo, senza stress e senza perdere tempo.
                </p>
            </div>

            <div class="flex flex-col gap-4 max-w-xl mx-auto mt-8 mb-4">
                <p class="text-sm text-papopsi-muted bg-papopsi-success-400 hover:bg-papopsi-success-600 hover:text-white px-4 py-2 rounded-full">Ricette su misura per il tuo bambino e la tua dispensa</p>
                <p class="text-sm text-papopsi-muted bg-papopsi-highlight-400 hover:bg-papopsi-highlight-600 hover:text-white px-4 py-2 rounded-full">Guida chiara e veloce, anche se non sei uno chef</p>
                <p class="text-sm text-papopsi-muted bg-papopsi-info-400 hover:bg-papopsi-info-600 hover:text-white px-4 py-2 rounded-full">Una community Telegram dedicata per aiuto e suggerimenti</p>
            </div>

            <a href="{{ config('links.telegram') }}" class="mt-8 mx-auto flex gap-2 font-semibold text-white bg-papopsi-brand px-6 py-3 rounded-full hover:shadow-md transition">
                <i data-lucide="send"></i>
                <span>Unisciti alla community su Telegram</span>
            </a>
        </div>
    </section>
    <!-- end: about Papopsi -->

    <!-- start: how it works -->
    <section class="px-6 py-16 bg-papopsi-muted">
        <h2 class="text-2xl font-bold text-center text-papopsi-muted mb-8">Come funziona</h2>
        <div class="max-w-xl mx-auto space-y-6 mb-8">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-papopsi-success-400 text-white flex items-center justify-center">
                    <i data-lucide="baby"></i>
                </div>
                <p class="text-base leading-relaxed"><span class="font-medium">Raccontaci di voi:</span><br/>Basta dirci l’età del tuo bimbo e qualche preferenza. Papopsi è come un amico che sa sempre cosa cucinare.</p>
            </div>
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-papopsi-success-400 text-white flex items-center justify-center">
                    <i data-lucide="utensils-crossed"></i>
                </div>
                <p class="text-base leading-relaxed"><span class="font-medium">Adatta alla tua cucina:</span><br/>Non hai i mirtilli? O si è rotto il frullatore? Papopsi si adatta a quello che hai, senza stress.</p>
            </div>
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-papopsi-success-400 text-white flex items-center justify-center">
                    <i data-lucide="sparkles"></i>
                </div>
                <p class="text-base leading-relaxed"><span class="font-medium">Prepara e condividi la magia:</span><br/>Cucina, assaggia e condividi la ricetta con altri genitori. Perché le pappe migliori nascono insieme.</p>
            </div>
        </div>

        <div class="flex justify-center mt-10 mb-10 mx-auto">
            <a
                href="{{ route('wizard.intro', ['source' => 'home']) }}"
                class="text-sm font-semibold text-white bg-papopsi-brand mt-8 px-4 py-2 rounded-full hover:shadow-md transition flex items-center gap-2"
            >
                <i data-lucide="chef-hat"></i>
                Prepara la pappa
            </a>
        </div>

        <div class="max-w-xl mx-auto bg-papopsi-info-50 border-l-4 border-papopsi-info p-4 rounded-lg flex items-start gap-2">
            <div class="flex-shrink-0">
                <i data-lucide="info" class="w-5 h-5 mt-1 text-papopsi-info"></i>
            </div>
            <div>
                <h2 class="text-sm font-semibold text-papopsi-info uppercase mb-2">Ricorda</h2>
                <p>Puoi creare fino a <span>3</span> ricette al giorno. Vuoi sbloccarne di più e sostenere il progetto? Offrici un caffè!</p>
            </div>
        </div>
    </section>
    <!-- end: how it works -->

    <!-- start: support Papopsi -->
    <section class="px-6 py-16 bg-papopsi-highlight-200">
        <div class="max-w-xl mx-auto text-center mb-8">
            <div class="flex justify-center mb-4">
                <i data-lucide="megaphone" class="w-8 h-8 text-papopsi-brand"></i>
            </div>
            <h2 class="text-xl font-bold mb-4 text-papopsi-muted">Papopsi è open source… ma non cresce da solo!</h2>
            <p class="text-base leading-relaxed mb-8">
                Papopsi è nato come un <span class="font-medium">progetto aperto e gratuito</span>: le sue funzionalità saranno sempre disponibili per ogni genitore.<br/>
                C’è solo un piccolo limite all’utilizzo quotidiano… perché mantenere questa magia ha un costo reale.
            </p>
            <h3 class="text-lg font-bold mb-2 text-papopsi-muted">Sostenere Papopsi significa:</h3>
            <ul class="flex flex-col gap-2 mb-8">
                <li>Aiutarci a migliorare l’AI e renderla sempre più brava a creare ricette su misura</li>
                <li>Coprire i costi di infrastruttura e, quando serve, coinvolgere professionisti del settore</li>
                <li>Far crescere una community di genitori che si aiutano davvero</li>
            </ul>
            <h3 class="text-lg font-bold mb-2 text-papopsi-muted">E poi, diciamolo...</h3>
            <p class="text-base leading-relaxed">
                Per ora sappiamo solo scrivere ricette… ma sogniamo di diventare il tuo supporto veloce, sicuro e sempre aggiornato in cucina.
            </p>
        </div>

        <div class="max-w-xl mx-auto text-center mb-8">
            <h3 class="text-xl font-bold mb-2 text-papopsi-muted">I nostri tier di donazione</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 md:gap-12 mt-4">
                <div class="space-y-2 mb-4">
                    <h4 class="flex justify-center gap-2 text-lg text-papopsi-brand"><i data-lucide="coffee"></i><span>1€</span></h4>
                    <p><span class="font-bold">5</span> ricette/giorno per <span class="font-bold">15</span> giorni</p>
                </div>
                <div class="space-y-2 mb-4">
                    <h4 class="flex justify-center gap-2 text-lg text-papopsi-brand"><i data-lucide="coffee"></i><i data-lucide="coffee"></i><span>3€</span></h4>
                    <p><span class="font-bold">10</span> ricette/giorno per <span class="font-bold">30</span> giorni</p>
                </div>
                <div class="space-y-2 mb-4">
                    <h4 class="flex justify-center gap-2 text-lg text-papopsi-brand"><i data-lucide="coffee"></i><i data-lucide="coffee"></i><i data-lucide="coffee"></i><span>5€</span></h4>
                    <p><span class="font-bold">20</span> ricette/giorno per <span class="font-bold">60</span> giorni</p>
                </div>
            </div>
        </div>

        <div class="max-w-xl mx-auto text-center space-y-4">
            <a href="{{ config('links.bmac') }}" class="text-sm font-semibold text-white bg-papopsi-success-400 hover:bg-papopsi-success-600 px-4 py-2 rounded-full hover:shadow-md transition flex items-center gap-2">
                <i data-lucide="coffee"></i>
                Offrimi un caffè!
            </a>
            <a href="{{ config('links.telegram') }}" class="text-sm font-semibold text-white bg-papopsi-info-400 hover:bg-papopsi-info-600 px-4 py-2 rounded-full hover:shadow-md transition flex items-center gap-2">
                <i data-lucide="chef-hat"></i>
                Hai domande? Scrivi su telegram
            </a>
        </div>
    </section>
    <!-- end: support Papopsi -->

</main>
