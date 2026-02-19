@extends('layout.app')

@section('title', 'Reyes&Friends - Política de Cookies')
@section('description', 'Conoce nuestra política de cookies y cómo utilizamos cookies para mejorar tu experiencia en nuestro sitio web.')
@section('keywords', 'cookies, política de cookies, privacidad, navegación')

@section('content')

<section class="py-16">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 gap-12 p-12 bg-zinc-900 rounded-xl">
            <div class="flex flex-col justify-center" data-aos="fade-up" data-aos-duration="1000">

                <h1 class="text-4xl md:text-5xl text-white mb-6 font-bold">
                    Política de <span class="text-red-600">Cookies</span>
                </h1>
                
                <p class="text-lg text-gray-200 mb-6">
                    En nuestro sitio web utilizamos cookies para mejorar la experiencia del usuario y recopilar información relevante sobre las visitas.
                </p>

                <div class="mb-8 flex flex-col gap-2">
                    <button id="reopen-cookies-modal" class="bg-red-700 text-white font-semibold px-4 py-2 rounded hover:bg-red-800 transition cursor-pointer">
                        Cambiar preferencias de cookies
                    </button>
                    <div id="current-cookies-level" class="text-gray-300 text-sm mt-2" style="display:none"></div>
                </div>

                <div class="space-y-8">
                    <div>
                        <h2 class="text-2xl text-white font-semibold mb-3">¿Qué son las cookies?</h2>
                        <p class="text-gray-200">Las cookies son pequeños archivos de texto que se almacenan en tu dispositivo cuando visitas nuestro sitio web. Nos ayudan a identificar tu navegador, tu dirección IP y otros datos como el nivel de aceptación de cookies.</p>
                    </div>

                    <div>
                        <h2 class="text-2xl text-white font-semibold mb-3">Tipos de cookies que utilizamos</h2>
                        <ul class="list-disc list-inside text-gray-200 space-y-2">
                            <li><strong>Cookies esenciales:</strong> Necesarias para el funcionamiento básico del sitio.</li>
                            <li><strong>Cookies de preferencias:</strong> Permiten recordar tus preferencias de navegación.</li>
                            <li><strong>Cookies de análisis:</strong> Recopilan información sobre cómo utilizas el sitio para mejorar nuestros servicios.</li>
                            <li><strong>Cookies de marketing:</strong> Utilizadas para personalizar la publicidad según tus intereses.</li>
                        </ul>
                    </div>

                    <div>
                        <h2 class="text-2xl text-white font-semibold mb-3">Información recopilada</h2>
                        <p class="text-gray-200">Cuando aceptas todas las cookies, recopilamos información como tu dirección IP, país, agente de usuario, nivel de cookies, datos de referencia, parámetros UTM y datos adicionales que puedas proporcionar.</p>
                    </div>

                    <div>
                        <h2 class="text-2xl text-white font-semibold mb-3">¿Cómo puedes gestionar las cookies?</h2>
                        <p class="text-gray-200">Puedes elegir el nivel de cookies que deseas aceptar al visitar nuestro sitio. Además, puedes eliminar o bloquear las cookies desde la configuración de tu navegador.</p>
                    </div>

                    <div>
                        <h2 class="text-2xl text-white font-semibold mb-3">Contacto</h2>
                        <p class="text-gray-200">Si tienes dudas sobre nuestra política de cookies, puedes contactarnos a través de nuestro <a href="{{ route('contact') }}" class="text-red-600 hover:underline font-semibold">Formulario de Contacto</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')

<script>
function shouldShowCookiesModal(force = false) {
    if (force) return true;
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

function showCookiesModal() {
    let modal = document.getElementById('cookies-modal');
    if (!modal) {
        modal = document.createElement('div');
        modal.id = 'cookies-modal';
        document.body.appendChild(modal);
    }
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
        <a class="bg-red-700 text-white font-semibold px-3 py-1.5 rounded hover:bg-red-800 transition flex-1 cursor-pointer flex items-center justify-center text-sm" href='/'>Detalles</a>
    </div>
</div>
    `;
}

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
        if (modal) {
            modal.setAttribute('data-aos', 'fade-out');
            modal.setAttribute('data-aos-duration', '600');
            modal.setAttribute('data-aos-once', 'true');
            setTimeout(() => {
                modal.style.display = 'none';
            }, 600);
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Mostrar el modal solo si no hay consentimiento guardado
    if (shouldShowCookiesModal()) {
        showCookiesModal();
    }
    // Botón para reabrir el modal
    const reopenBtn = document.getElementById('reopen-cookies-modal');
    if (reopenBtn) {
        reopenBtn.addEventListener('click', function() {
            showCookiesModal();
        });
    }

    // Mostrar el tipo de cookies aceptadas actualmente si existe en localStorage
    const cookiesLevelDiv = document.getElementById('current-cookies-level');
    if (cookiesLevelDiv) {
        const consent = localStorage.getItem('cookie_consent');
        if (consent) {
            try {
                const parsed = JSON.parse(consent);
                if (parsed && parsed.level) {
                    let label = '';
                    if (parsed.level === 'all') label = 'todas las cookies';
                    else if (parsed.level === 'necessary') label = 'solo las cookies necesarias';
                    else label = parsed.level;
                    cookiesLevelDiv.textContent = `Actualmente tienes aceptadas: ${label}.`;
                    cookiesLevelDiv.style.display = '';
                }
            } catch (e) {}
        }
    }
});
</script>

@endpush