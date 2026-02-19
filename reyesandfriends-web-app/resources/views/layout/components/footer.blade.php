<footer class="bg-black text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div>
            <div class="flex justify-center mb-4">
                <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="px-4 py-2 flex items-center gap-2 cursor-pointer hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('img/logo/reyesandfriends_01.svg') }}" alt="Reyes&Friends Logo" class="h-14">
                </button>
            </div>
            <p class="text-gray-400 text-sm">Desarrollamos soluciones informáticas a medida para empresas y emprendedores, desde páginas web hasta aplicaciones móviles, ayudándolos a crecer y destacar en el mundo digital.</p>
            </div>
            <div>
            <h3 class="text-lg font-semibold mb-4 pb-2 border-b border-red-700">Empresa</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('about_us') }}" class="hover:underline font-medium">Sobre Nosotros</a></li>
                <li><a href="{{ route('portfolio') }}" class="hover:underline font-medium">Portafolio</a></li>
                <li><a href="{{ route('blog') }}" class="hover:underline font-medium">Blog</a></li>
            </ul>
            </div>
            <div>
            <h3 class="text-lg font-semibold mb-4 pb-2 border-b border-red-700">Soporte</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('how_works') }}" class="hover:underline font-medium">Como Funciona</a></li>
                <li><a href="{{ route('contact') }}" class="hover:underline font-medium">Contacto</a></li>
                <li><a href="{{ route('faq') }}" class="hover:underline font-medium">FAQ</a></li>
            </ul>
            </div>
            <div>
            <h3 class="text-lg font-semibold mb-4 pb-2 border-b border-red-700">Legal</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('privacy') }}" class="hover:underline font-medium">Privacidad</a></li>
                <li><a href="{{ route('terms') }}" class="hover:underline font-medium">Términos</a></li>
                <li><a href="{{ route('cookies') }}" class="hover:underline font-medium">Cookies</a></li>
            </ul>
            </div>
            </div>
            <div class="border-t border-red-700 pt-8 flex justify-between items-center">
            <p class="text-center text-gray-400 flex-1">&copy; {{ date('Y') }} Reyes&Friends. Todos los derechos reservados.</p>
            </div>
            </div>
</footer>