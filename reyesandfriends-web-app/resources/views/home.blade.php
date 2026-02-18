@extends('layout.app')

@section('title', 'Reyes&Friends - Desarrollo web, apps y software a medida')
@section('description', 'Desarrollamos páginas web, aplicaciones móviles y software a medida para impulsar tu negocio al siguiente nivel. Soluciones digitales innovadoras, planes web desde $' . number_format($cheaperWebPlan->price_clp, 0, ',', '.') . '/mes. ¡Transforma tu empresa hoy!')
@section('keywords', 'desarrollo web, software a medida, aplicaciones móviles, diseño web, soluciones digitales, empresa, negocios, tecnología, chile, planes web')

@section('content')
    <section class="relative w-full h-[70vh] flex items-center justify-center bg-cover bg-center overflow-hidden">
            <img src="{{ asset('img/background/background-web.jpg') }}" alt="Ilustración de fondo" class="absolute inset-0 w-full h-full object-cover pointer-events-none grayscale" />
            <div class="absolute inset-0 bg-red-950/90"></div>
            <div class="relative z-10 container mx-auto flex flex-col md:flex-row items-center h-full px-6 gap-8">
                <div class="w-full md:w-1/2 text-white space-y-6" data-aos="fade-right" data-aos-duration="1200">
                    <h1 class="text-5xl md:text-6xl font-bold mb-4 drop-shadow-lg" data-aos="fade-down" data-aos-delay="200" data-aos-easing="ease-in-out" data-aos-duration="1200">Desarrollamos</h1>
                    <p class="text-2xl md:text-3xl text-red-600 mb-6 drop-shadow font-medium" data-aos="fade-up" data-aos-delay="400" data-aos-easing="ease-in-out" data-aos-duration="1200">tu solución digital innovadora</p>
                    <p class="text-lg md:text-xl text-gray-200 leading-relaxed font-medium" data-aos="fade-up" data-aos-delay="600" data-aos-easing="ease-in-out" data-aos-duration="1200">Transforma tu negocio con tecnología a tu medida! Desarrollamos sitios web con contenido atractivo y actualizable, plataformas digitales y soluciones personalizadas para que tu empresa crezca y destaque en el mundo digital.</p>
                    <p class="text-xl md:text-3xl text-white drop-shadow font-medium" data-aos="fade-up" data-aos-delay="800" data-aos-easing="ease-in-out" data-aos-duration="1200">Planes Web desde <span class="text-2xl md:text-3xl text-red-600">${{ number_format($cheaperWebPlan->price_clp, 0, ',', '.') }}/mes</span></p>
                    <a href="{{ route('web_plans') }}" class="inline-block bg-red-800 hover:bg-red-900 text-white font-bold py-3 px-8 rounded text-lg transition" data-aos="zoom-in" data-aos-delay="1000" data-aos-easing="ease-in-out" data-aos-duration="1200">Cotiza tu Plan Web <i class="fas fa-arrow-right ml-2"></i></a>
                    </div>
                <div class="w-full md:w-1/2 flex justify-center" data-aos="fade-left" data-aos-duration="1200">
                    <img src="{{ asset('img/home/desktop.png') }}" alt="Solución digital" class="w-3/4 h-auto drop-shadow-xl pointer-events-none" />
                </div>
            </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl mb-12 text-center relative">
                <span class="bg-zinc-900 px-4 relative z-10 text-white">Nuestros Servicios</span>
                <div class="absolute left-0 right-0 top-1/2 h-0.5 bg-red-700 -z-0"></div>
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($services as $service)
                        <div class="rounded border border-zinc-800 hover:border-red-700 p-6 flex flex-col items-center text-center transition" data-aos="zoom-in" data-aos-delay="{{ 200 + ($loop->index * 100) }}" data-aos-once="true">
                        @if($service->icon)
                            <i class="fa {{ $service->icon }} text-4xl mb-4 text-red-800"></i>
                        @endif
                        <h3 class="text-xl font-semibold mb-2">{{ $service->name }}</h3>
                        <p class="text-white">{{ $service->description }}</p>
                        <a href="" class="text-red-600 hover:underline font-semibold mt-4">Mas información</a>
                    </div>
                @endforeach
            </div>
            <h2 class="text-3xl mb-12 text-center relative mt-16">
                <span class="bg-zinc-900 px-4 relative z-10 text-white">Sitios Web que Impulsan tu Negocio</span>
                <div class="absolute left-0 right-0 top-1/2 h-0.5 bg-red-700 -z-0"></div>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="flex flex-col justify-center" data-aos="fade-right" data-aos-delay="200" data-aos-once="true">
                    <p class="text-lg text-gray-300 leading-relaxed max-w-3xl" data-aos="fade-up" data-aos-delay="200" data-aos-once="true">
                        Ofrecemos soluciones de desarrollo Full Stack, abarcando tanto el frontend como el backend. Nuestro equipo de expertos utiliza tecnologías modernas para crear aplicaciones web y móviles que son rápidas, seguras y escalables. Desde la concepción hasta la implementación, nos aseguramos de que cada proyecto cumpla con los más altos estándares de calidad y rendimiento, brindando a nuestros clientes una experiencia digital excepcional.
                    </p>
                </div>
                <div class="flex justify-center" data-aos="fade-left" data-aos-delay="200" data-aos-once="true">
                    <img src="{{ asset('img/home/computadoras.jpg') }}" alt="Ilustración de desarrollo Full Stack" class="w-2/3 h-auto rounded-lg drop-shadow-xl pointer-events-none" />
                </div>
            </div>

        </div>
    </section>

    <section class="relative w-full h-[50vh] flex items-center justify-center bg-cover bg-center overflow-hidden">
        <img src="{{ asset('img/background/background-web.jpg') }}" alt="Ilustración de fondo" class="absolute inset-0 w-full h-full object-cover pointer-events-none grayscale" />
        <div class="absolute inset-0 bg-red-950/90"></div>
        <div class="relative z-10 flex flex-col items-center justify-center w-full px-6 gap-6">
            <div class="flex flex-col md:flex-row items-center gap-6">
            <h1 class="text-4xl md:text-6xl font-bold text-white drop-shadow-lg flex items-center gap-4">WHATSAPP <span class="text-red-600">+56 9 8203 4567</span></h1>
            <a href="https://wa.me/56982034567" target="_blank" class="inline-block bg-red-800 hover:bg-red-900 text-white font-bold py-3 px-8 rounded text-lg transition">Contactar <i class="fa-brands fa-whatsapp"></i></a>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-6">

            <h2 class="text-3xl mb-12 text-center relative mt-16">
                <span class="bg-zinc-900 px-4 relative z-10 text-white">¿Listo para transformar tu negocio?</span>
                <div class="absolute left-0 right-0 top-1/2 h-0.5 bg-red-700 -z-0"></div>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="flex flex-col justify-center" data-aos="fade-right" data-aos-delay="200" data-aos-once="true">
                    <p class="text-lg text-gray-300 leading-relaxed max-w-3xl" data-aos="fade-up" data-aos-delay="200" data-aos-once="true">
                       Visita nuestros <a href="{{ route('web_plans') }}" class="text-red-600 hover:underline font-semibold">Planes Web</a> o contáctanos a través de nuestro <a href="{{ route('contact') }}" class="text-red-600 hover:underline font-semibold">Formulario de Contacto</a> para obtener una cotización personalizada. Nos pondremos en contacto a la brevedad!
                    </p>
                </div>
                <div class="flex justify-center" data-aos="fade-left" data-aos-delay="200" data-aos-once="true">
                    <img src="{{ asset('img/home/equipo-robot.png') }}" alt="Ilustración de equipo de trabajo" class="w-2/3 h-auto pointer-events-none robot-fade-mask" />
                </div>
            </div>

        </div>
    </section>


    
@endsection