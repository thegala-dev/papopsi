<main>
    <!-- start: hero -->
    <section class="min-h-[70vh] flex flex-col justify-center items-center text-center px-6 py-16 bg-papopsi-muted">
        <h1 class="text-3xl sm:text-4xl font-bold max-w-2xl leading-tight text-papopsi-muted">
            Se ti chiedi <br><span class="text-papopsi-brand">“Cosa gli do oggi?”</span><br> la risposta è una sola:
        </h1>
        <p class="mt-4 text-2xl font-extrabold text-papopsi-brand tracking-wide">Chiama Papopsi!</p>
        <p class="max-w-xl text-center text-base mt-6">Ogni giorno, milioni di genitori hanno lo stesso dubbio. Papopsi è la tua spalla tecnologica: ti ascolta, capisce la situazione e crea una pappa su misura. Gratuita, equilibrata, semplice.</p>
        <a href="{{ route('wizard.intro') }}" class="mt-8 text-base font-semibold text-white bg-papopsi-brand px-6 py-3 rounded-full hover:bg-papopsi-brand/90 transition">
            Prepara la pappa
        </a>
    </section>
    <!-- end: hero -->

    <!-- start: about Papopsi -->
    <section class="px-6 py-12 bg-papopsi-highlight-200 text-center">
        <h2 class="text-xl font-bold text-papopsi-muted mb-6">Perché nasce Papopsi</h2>

        <div class="flex flex-col gap-4 max-w-xl mx-auto mb-8">
            <p class="text-sm text-papopsi-text bg-papopsi-highlight-400 inline-block px-4 py-2 rounded-full self-start">Non so mai cosa cucinare per mio figlio di 9 mesi...</p>
            <p class="text-sm text-papopsi-text bg-papopsi-info-400 inline-block px-4 py-2 rounded-full self-end">Spero che questo vada bene per la sua età!</p>
            <p class="text-sm text-papopsi-text bg-papopsi-danger-400 inline-block px-4 py-2 rounded-full self-start">Ha mangiato troppi carboidrati oggi?</p>
            <p class="text-sm text-papopsi-text bg-papopsi-secondary inline-block px-4 py-2 rounded-full self-end">E se non gli piacesse?</p>
            <p class="text-sm text-papopsi-text bg-papopsi-success-400 inline-block px-4 py-2 rounded-full self-start">Non ho tempo per leggere libri su libri…</p>
            <p class="text-sm text-papopsi-text bg-papopsi-brand inline-block px-4 py-2 rounded-full self-end">Vorrei solo un consiglio semplice e sicuro!</p>
        </div>

        <p class="max-w-xl mx-auto text-base leading-relaxed mt-4">
            Papopsi nasce da una domanda che conosco bene, perché l’ho vissuta io per primo: <strong>“Cosa preparo oggi per Jacopo?”</strong><br>
            Quando sei un genitore alle prese con lo svezzamento, ogni pasto diventa un punto interrogativo. Vuoi fare bene, vuoi farlo con amore, ma il tempo è poco e le fonti sono infinite (e spesso contraddittorie).
        </p>
        <p class="max-w-xl mx-auto text-base leading-relaxed mt-4">
            E allora ho deciso di creare Papopsi: <strong>un piccolo aiuto gratuito e giocoso</strong> che usa la tecnologia per semplificarti la vita.<br>
            Un assistente che sta imparando ogni giorno a fornirti pasti sicuri, genuini e deliziosi. Che non giudica e che ti suggerisce ricette buone, sane, veloci. Personalizzate in base all’età del tuo bimbo e agli ingredienti che hai in casa.
        </p>
        <p class="max-w-xl mx-auto text-base leading-relaxed mt-4">
            È pensato per genitori (e nonni!) veri, che vogliono nutrire con cura senza perdere la testa. E magari, tornare a godersi il momento pappa con più serenità.
        </p>
    </section>
    <!-- end: about Papopsi -->

    <!-- start: how it works -->
    <section class="px-6 py-16 bg-papopsi-muted">
        <h2 class="text-xl font-bold text-center text-papopsi-muted mb-8">Come funziona</h2>
        <div class="max-w-xl mx-auto space-y-6">
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-papopsi-success text-white flex items-center justify-center">
                    <i data-lucide="baby"></i>
                </div>
                <p class="text-base leading-relaxed">Inserisci l'età del tuo bambino</p>
            </div>
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-papopsi-success text-white flex items-center justify-center">
                    <i data-lucide="home"></i>
                </div>
                <p class="text-base leading-relaxed">Fornisci a Papopsi il contesto: dove vivi, quanto tempo hai e quanto te la cavi in cucina</p>
            </div>
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-papopsi-success text-white flex items-center justify-center">
                    <i data-lucide="utensils"></i>
                </div>
                <p class="text-base leading-relaxed">Papopsi calcola ingredienti e accessori. Non ti piace qualcosa? Puoi modificarlo o ricalcolare</p>
            </div>
            <div class="flex items-start gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-full bg-papopsi-success text-white flex items-center justify-center">
                    <i data-lucide="chef-hat"></i>
                </div>
                <p class="text-base leading-relaxed">Papopsi prepara la ricetta su misura. Puoi condividerla, salvarla e tornare quando vuoi</p>
            </div>
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('wizard.intro') }}" class="text-base font-semibold text-white bg-papopsi-brand px-6 py-3 rounded-full hover:bg-papopsi-brand/90 transition">
                Prepara la pappa
            </a>
        </div>
    </section>
    <!-- end: how it works -->

    <!-- start: support Papopsi -->
    <section class="px-6 py-16 bg-papopsi-highlight-200">
        <div class="max-w-xl mx-auto text-center">
            <div class="flex justify-center mb-4">
                <i data-lucide="megaphone" class="w-8 h-8 text-papopsi-brand"></i>
            </div>
            <h2 class="text-xl font-bold mb-4 text-papopsi-muted">Papopsi ha bisogno anche di te</h2>
            <p class="text-base leading-relaxed mb-3">
                La versione gratuita ti permette di generare <strong>fino a 3 ricette al giorno</strong>, tutte personalizzate e pronte da condividere. Ma se vuoi che Papopsi impari ancora di più e ti aiuti meglio... puoi supportare il progetto!
            </p>
            <p class="text-base leading-relaxed mb-4">
                Con una piccola donazione su <a href="https://buymeacoffee.com/thegaladev" class="underline font-medium text-papopsi-brand" target="_blank">Buy Me a Coffee</a>, potrai sbloccare <strong>ricette extra</strong> ogni giorno e aiutare altri genitori come te. Da 5 ricette al giorno per una settimana fino a 20 al giorno per 2 mesi.
            </p>
            <p class="text-base leading-relaxed">
                Se Papopsi ti è stato utile, dagli una mano a crescere. Ogni contributo aiuta. 💗
            </p>
        </div>
    </section>
    <!-- end: support Papopsi -->

</main>
