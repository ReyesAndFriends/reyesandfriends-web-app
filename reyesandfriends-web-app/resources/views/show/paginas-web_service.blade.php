@extends('layout.app')

@section('title', $service->name . ' - Reyes&Friends - Desarrollo web, apps y software a medida')
@section('description', $service->description . ' Soluciones innovadoras, diseño intuitivo y rendimiento excepcional. ¡Transforma tu empresa con una app a medida hoy!')
@section('keywords', 'desarrollo web, software a medida, aplicaciones móviles, diseño web, soluciones digitales, empresa, negocios, tecnología, chile, apps móviles, desarrollo de apps, aplicaciones personalizadas')

@section('content')
    <section class="relative w-full min-h-[90vh] md:min-h-[70vh] flex items-center justify-center bg-cover bg-center overflow-hidden py-12 md:py-0">
            <img src="{{ asset('img/background/background-web.jpg') }}" alt="Ilustración de fondo" class="absolute inset-0 w-full h-full object-cover pointer-events-none grayscale" />
            <div class="absolute inset-0 bg-red-950/90"></div>
            <div class="relative z-10 container mx-auto flex flex-col md:flex-row items-center h-full px-6 gap-8 md:gap-10">
                <div class="w-full md:w-1/2 text-white space-y-6" data-aos="fade-right" data-aos-duration="1200">
                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-4 drop-shadow-lg" data-aos="fade-down" data-aos-delay="200" data-aos-easing="ease-in-out" data-aos-duration="1200">{{ $service->name }}</h1>
                    <p class="text-xl sm:text-2xl md:text-3xl text-red-600 mb-6 drop-shadow font-medium" data-aos="fade-up" data-aos-delay="400" data-aos-easing="ease-in-out" data-aos-duration="1200">{{ $service->description }}</p>
                    </div>
                <div class="w-full md:w-1/2 flex justify-center" data-aos="fade-left" data-aos-duration="1200">
                    <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" class="w-auto h-[240px] sm:h-[300px] md:h-auto md:w-3/4 max-w-full drop-shadow-xl pointer-events-none object-contain" />
                </div>
            </div>
    </section>

    <section class="py-16">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl mb-12 text-center relative">
            <span class="bg-zinc-900 px-4 relative z-10 text-white">Características</span>
            <div class="absolute left-0 right-0 top-1/2 h-0.5 bg-red-700 -z-0"></div>
        </h2>

        <div class="space-y-16">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="space-y-4" data-aos="fade-right" data-aos-delay="200" data-aos-once="true">
                <h3 class="text-2xl font-bold text-white mb-4">Característica 1</h3>
                <ul class="space-y-3 text-gray-300">
                <li class="flex items-start gap-3">
                    <span class="text-red-600 font-bold mt-1">•</span>
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-red-600 font-bold mt-1">•</span>
                    <span>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-red-600 font-bold mt-1">•</span>
                    <span>Ut enim ad minim veniam, quis nostrud exercitation.</span>
                </li>
                </ul>
            </div>
            <div class="flex justify-center" data-aos="fade-left" data-aos-delay="200" data-aos-once="true">
                <img src="" alt="Característica 1" class="w-2/3 h-auto rounded-lg drop-shadow-xl pointer-events-none" />
            </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="flex justify-center" data-aos="fade-right" data-aos-delay="200" data-aos-once="true">
                <img src="" alt="Característica 2" class="w-2/3 h-auto rounded-lg drop-shadow-xl pointer-events-none" />
            </div>
            <div class="space-y-4" data-aos="fade-left" data-aos-delay="200" data-aos-once="true">
                <h3 class="text-2xl font-bold text-white mb-4">Característica 2</h3>
                <ul class="space-y-3 text-gray-300">
                <li class="flex items-start gap-3">
                    <span class="text-red-600 font-bold mt-1">•</span>
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-red-600 font-bold mt-1">•</span>
                    <span>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-red-600 font-bold mt-1">•</span>
                    <span>Ut enim ad minim veniam, quis nostrud exercitation.</span>
                </li>
                </ul>
            </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="space-y-4" data-aos="fade-right" data-aos-delay="200" data-aos-once="true">
                <h3 class="text-2xl font-bold text-white mb-4">Característica 3</h3>
                <ul class="space-y-3 text-gray-300">
                <li class="flex items-start gap-3">
                    <span class="text-red-600 font-bold mt-1">•</span>
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-red-600 font-bold mt-1">•</span>
                    <span>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-red-600 font-bold mt-1">•</span>
                    <span>Ut enim ad minim veniam, quis nostrud exercitation.</span>
                </li>
                </ul>
            </div>
            <div class="flex justify-center" data-aos="fade-left" data-aos-delay="200" data-aos-once="true">
                <img src="" alt="Característica 3" class="w-2/3 h-auto rounded-lg drop-shadow-xl pointer-events-none" />
            </div>
            </div>
        </div>

    </div>
    </section>

@endsection