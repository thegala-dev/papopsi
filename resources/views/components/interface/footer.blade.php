<footer class="py-8 bg-papopsi-muted border-t border-t-gray-200">
    <div class="container mx-auto px-6 text-center space-y-4 text-sm">
        <p>
            Hai domande o idee? <a href="{{ config('links.telegram') }}" class="underline text-papopsi-brand">Scrivici su Telegram</a>
        </p>
        <div class="flex justify-center gap-6">
            <a href="https://coff.ee/thegaladev">Dona</a>
            <a href="#">Privacy</a>
            <a href="#">Cookie</a>
        </div>
        <p class="text-xs text-gray-400">Papopsi © {{ now()->year }}</p>
    </div>
</footer>
