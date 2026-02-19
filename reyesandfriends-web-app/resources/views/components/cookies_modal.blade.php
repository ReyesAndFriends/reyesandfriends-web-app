<script>
function shouldShowCookiesModal() {
    const consent = localStorage.getItem('cookie_consent');
    if (consent) {
        try {
            const parsed = JSON.parse(consent);
            const now = Date.now();
            const oneYear = 365 * 24 * 60 * 60 * 1000;
            if (parsed && parsed.level && parsed.timestamp && (now - parsed.timestamp) < oneYear) {
                return false;
            }
        } catch (e) {}
    }
    return true;
}
</script>
<div id="cookies-modal" style="display:none"></div>
</script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    if (shouldShowCookiesModal()) {
        const modal = document.getElementById('cookies-modal');
        if (modal) {
            modal.style.display = '';
            modal.innerHTML = `
<div class="fixed bottom-4 right-4 z-50 bg-black bg-opacity-90 rounded-lg shadow-lg p-6 flex flex-col items-start gap-4 w-96 max-w-full" style="font-family: inherit;" data-aos="fade-up" data-aos-duration="600" data-aos-once="true">
    <div class="flex items-center gap-2">
        <span class="text-white text-lg font-semibold">Este sitio usa cookies</span>
    </div>
    <p class="text-gray-300 text-sm">Utilizamos cookies para mejorar tu experiencia. Puedes aceptar todas, solo las necesarias, o ver detalles.</p>
    <div class="flex gap-2 w-full">
        <button class="bg-white text-black font-semibold px-3 py-1.5 rounded hover:bg-gray-200 transition flex-1 cursor-pointer text-sm" onclick="window.acceptCookies('all')">Aceptar todas</button>
        <button class="bg-gray-700 text-white font-semibold px-3 py-1.5 rounded hover:bg-gray-800 transition flex-1 cursor-pointer text-sm" onclick="window.acceptCookies('necessary')">Solo necesarias</button>
        <a class="bg-red-700 text-white font-semibold px-3 py-1.5 rounded hover:bg-red-800 transition flex-1 cursor-pointer flex items-center justify-center text-sm" href="/">Detalles</a>
    </div>
</div>
            `;
        }
    }
});

window.acceptCookies = function(type) {
    fetch(@json(route('cookies.accept')), {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ cookie_level: type })
    }).then(() => {
        localStorage.setItem('cookie_consent', JSON.stringify({
            level: type,
            timestamp: Date.now()
        }));
        const modal = document.getElementById('cookies-modal');
        modal.setAttribute('data-aos', 'fade-out');
        modal.setAttribute('data-aos-duration', '600');
        modal.setAttribute('data-aos-once', 'true');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 600);
    });
}
</script>