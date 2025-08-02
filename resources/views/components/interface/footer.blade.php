<footer class="py-8 bg-papopsi-muted border-t border-t-gray-200">
    <div class="container mx-auto px-6 text-center space-y-4 text-sm">
        <p>
            Hai domande o idee? <a href="{{ config('links.telegram') }}" class="underline text-papopsi-brand">Scrivici su Telegram</a>
        </p>
        <div class="flex justify-center gap-6">
            <a href="{{ config('links.github') }}">Github</a>
            <a href="{{ config('links.bmac') }}">Dona</a>
            <a href="https://www.iubenda.com/privacy-policy/23446180" class="iubenda-black iubenda-noiframe iubenda-embed iubenda-noiframe " title="Privacy Policy ">Privacy Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
            <a href="https://www.iubenda.com/privacy-policy/23446180/cookie-policy" class="iubenda-black iubenda-noiframe iubenda-embed iubenda-noiframe " title="Cookie Policy ">Cookie Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
        </div>
        <p class="text-xs text-gray-400">Papopsi © {{ now()->year }}</p>
    </div>
</footer>
1
