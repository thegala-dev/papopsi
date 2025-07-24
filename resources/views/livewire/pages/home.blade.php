<div class="bg-papopsi-background text-papopsi-text">

    {{-- HERO full-width con lead --}}
    <section class="min-h-screen flex flex-col justify-center items-center text-center px-6">
        <h1 class="text-5xl sm:text-6xl font-bold max-w-3xl leading-tight">
            Hai un bambino piccolo, poco tempo e mille dubbi su cosa cucinare? <strong>Non sei solo.</strong>
        </h1>
        <p class="lead max-w-2xl mt-6">
            Papopsi ti fa poche domande, capisce la tua situazione e crea subito una pappa <span class="highlight">su misura</span> per il tuo bimbo.
        </p>
        <button
            wire:click="redirectToWizard"
            class="mt-10 btn-pill bg-papopsi-primary text-white hover:bg-papopsi-primary/90 transition cursor-pointer"
        >
            Prepara la pappa
        </button>
    </section>

    {{-- SEZIONE full-width muted per introdurre il problema --}}
    <section class="py-16 px-6 bg-papopsi-muted text-center">
        <p class="max-w-3xl mx-auto text-base sm:text-lg leading-relaxed">
            Ogni giorno ti chiedi: <strong>“Cosa posso cucinare oggi al mio bambino?”</strong><br>
            Tra forum, blog e consigli discordanti, diventa impossibile anche solo partire.
        </p>
    </section>

    {{-- CARD: Una piccola rivoluzione in cucina --}}
    <section class="container mx-auto my-16 px-6">
        <div class="bg-papopsi-card p-8 rounded-2xl shadow-sm max-w-3xl mx-auto">
            <h2 class="text-3xl font-semibold mb-4">Una piccola rivoluzione in cucina</h2>
            <div class="space-y-4 text-base sm:text-lg leading-relaxed">
                <p>
                    Questa piccola rivoluzione nasce da una domanda che accomuna tantissimi genitori:
                    <strong>"Cosa posso cucinare oggi al mio bambino?"</strong> Non una volta sola, ma ogni giorno. A volte anche più volte al giorno.
                </p>
                <p>
                    Non serve essere chef stellati, basta voler fare le cose per bene. Eppure tra supermercati, liste ingredienti e mille raccomandazioni che cambiano da blog a forum, diventa difficile anche solo capire da dove partire.
                </p>
                <p>
                    Papopsi è nato esattamente qui: nel mezzo della stanchezza, della confusione, della voglia di fare il meglio.
                </p>
                <p>
                    Sono un padre, lavoro nella tecnologia e sono convinto che, se usati bene, gli strumenti digitali possano rendere più facile la vita di tutti.
                    Papopsi è il tentativo di unire tutto questo: semplicità, personalizzazione e un aiuto concreto nella quotidianità.
                </p>
                <p>
                    Uno strumento semplice, che ti fa le domande giuste e ti restituisce una proposta chiara, su misura. Un alleato, non un maestro.
                </p>
                <p>
                    Nessuno nasce con tutte le risposte, ma passo dopo passo possiamo imparare a cucinare in modo consapevole, adatto a chi sta crescendo.
                </p>
            </div>
        </div>
    </section>

    {{-- CARD: Come funziona Papopsi? --}}
    <section class="container mx-auto my-16 px-6">
        <div class="bg-papopsi-card p-8 rounded-2xl shadow-sm max-w-3xl mx-auto">
            <h2 class="text-3xl font-semibold mb-4">Come funziona Papopsi?</h2>
            <ul class="list-disc list-inside space-y-2 text-base sm:text-lg leading-relaxed">
                <li>Rispondi a poche domande: età, ingredienti, preferenze.</li>
                <li>In pochi secondi Papopsi genera una ricetta chiara e bilanciata.</li>
                <li>Modificala, stampala o condividila con un click.</li>
            </ul>
        </div>
    </section>

    {{-- CTA INTERMEDIA full-width --}}
    <section class="py-12 text-center px-6">
        <button
            wire:click="redirectToWizard"
            class="btn-pill bg-papopsi-primary text-white hover:bg-papopsi-primary/90 transition cursor-pointer"
        >
            Prepara la pappa
        </button>
    </section>

    {{-- CARD: Cosa puoi fare per far crescere questo progetto --}}
    <section class="container mx-auto my-16 px-6">
        <div class="bg-papopsi-card p-8 rounded-2xl shadow-sm max-w-3xl mx-auto">
            <h2 class="text-3xl font-semibold mb-4">Cosa puoi fare per far crescere questo progetto</h2>
            <p class="text-base sm:text-lg leading-relaxed mb-6">
                Papopsi è gratuito, indipendente e in continua evoluzione. Lo stiamo costruendo con cura, ascoltando chi lo usa davvero: i genitori, come te.
            </p>
            <p class="text-base sm:text-lg leading-relaxed mb-6">
                Il nostro obiettivo è offrire uno strumento utile e accessibile a tutti, anche a chi non può contribuire economicamente. Se non puoi donare, il tuo feedback, la tua esperienza e il tuo supporto sono comunque preziosi: è così che Papopsi può crescere, migliorare e restare davvero al servizio di tutti.
            </p>
            <p class="text-base sm:text-lg leading-relaxed mb-6">
                Se vuoi darci una mano, puoi fare una piccola donazione: ci aiuterai a mantenere gratuito Papopsi e a sviluppare nuove funzionalità.
            </p>
            <p class="text-base sm:text-lg leading-relaxed mb-6">
                Abbiamo tanti progetti in cantiere: una sezione dedicata alle ricette salvate, dove condividere i risultati più utili con altri genitori; un'area personale con lo storico delle pappe create, per poterle ritrovare e modificare con facilità; e la creazione di una community dove scambiare idee, suggerimenti e supporto.
            </p>
            <p class="text-base sm:text-lg leading-relaxed mb-6">
                Ogni contributo ci permette di fare un passo in più. Se puoi, sostienici. Se non puoi, raccontaci cosa pensi: vale tantissimo anche quello.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a
                    href="https://coff.ee/thegaladev"
                    target="_blank"
                    class="btn-pill bg-papopsi-muted text-papopsi-primary hover:bg-papopsi-muted/90 transition">
                    Dona un cucchiaino 🍴
                </a>
                <a href="mailto:ciao@papopsi.it" class="btn-pill border border-papopsi-muted text-papopsi-text hover:bg-papopsi-muted/50 transition">
                    Scrivici
                </a>
            </div>
        </div>
    </section>

    {{-- CARD: Resta con noi --}}
    <section class="container mx-auto my-16 px-6">
        <div class="bg-papopsi-card p-8 rounded-2xl shadow-sm max-w-3xl mx-auto text-center">
            <h2 class="text-3xl font-semibold mb-4">Resta con noi</h2>
            <p class="text-base sm:text-lg leading-relaxed mb-4">
                Papopsi è in continua evoluzione: questa lista è il nostro termometro di interesse reale.
                Se un giorno ti scriveremo, significherà che abbiamo novità pronte per te.
            </p>
            <form class="flex flex-col sm:flex-row gap-4 justify-center">
                <input
                    type="email"
                    placeholder="La tua email"
                    class="flex-1 px-4 py-3 rounded-lg border border-papopsi-muted focus:outline-none focus:ring-2 focus:ring-papopsi-primary"
                >
                <button type="submit" class="btn-pill bg-papopsi-primary text-white hover:bg-papopsi-primary/90 transition cursor-pointer">
                    Iscriviti
                </button>
            </form>
        </div>
    </section>

    {{-- FOOTER full-width --}}
    <footer class="py-8 bg-papopsi-card">
        <div class="container mx-auto px-6 text-center space-y-4 text-sm">
            <p>
                Hai dubbi o idee? <a href="mailto:ciao@papopsi.it" class="underline text-papopsi-primary">Scrivici</a>
            </p>
            <div class="flex justify-center gap-6">
                <a href="#">Dona un cucchiaino</a>
                <a href="#">Privacy</a>
                <a href="#">Cookie</a>
            </div>
            <p class="text-xs text-gray-400">Papopsi © {{ now()->year }}</p>
        </div>
    </footer>

</div>
