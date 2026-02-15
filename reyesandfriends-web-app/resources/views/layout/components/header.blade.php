<header id="main-header" class="bg-black text-white sticky top-0 z-50 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center">
                <img 
                    src="{{ asset('img/logo/reyesandfriends_01.svg') }}" 
                    alt="Reyes&Friends Logo" 
                    class="h-12 hover:scale-105 transition-transform duration-300"
                >
            </a>
            <nav class="hidden md:block">
                <ul class="flex space-x-6 font-medium">
                    <li><a href="{{ route('web_plans') }}" class="hover:underline">Planes Web</a></li>
                    <li><a href="{{ route('how_works') }}" class="hover:underline">Como Funciona</a></li>
                    <li><a href="/" class="hover:underline">Contacto</a></li>
                </ul>
            </nav>
            <button id="menu-toggle" class="md:hidden ml-2 text-2xl focus:outline-none" aria-label="Abrir menú">
                <i id="menu-icon" class="fas fa-bars"></i>
                <i id="close-icon" class="fas fa-times" style="display:none;"></i>
            </button>
        </div>
        <nav id="mobile-menu" class="md:hidden bg-black text-white shadow-lg py-4 px-6 flex flex-col space-y-4 fixed top-20 left-0 w-full z-40 transition-all duration-300 hidden">
            <a href="{{ route('web_plans') }}" class="hover:underline">Planes Web</a>
            <a href="{{ route('how_works') }}" class="hover:underline">Como Funciona</a>
            <a href="/" class="hover:underline">Contacto</a>
        </nav>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const header = document.getElementById('main-header');
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');
        let menuOpen = false;

        window.addEventListener('scroll', function () {
            if (window.scrollY > 10) {
                header.classList.add('shadow');
            } else {
                header.classList.remove('shadow');
            }
        });

        menuToggle.addEventListener('click', function () {
            menuOpen = !menuOpen;
            if (menuOpen) {
                mobileMenu.classList.remove('hidden');
                menuIcon.style.display = 'none';
                closeIcon.style.display = '';
            } else {
                mobileMenu.classList.add('hidden');
                menuIcon.style.display = '';
                closeIcon.style.display = 'none';
            }
        });

        mobileMenu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                menuOpen = false;
                mobileMenu.classList.add('hidden');
                menuIcon.style.display = '';
                closeIcon.style.display = 'none';
            });
        });
    });
</script>