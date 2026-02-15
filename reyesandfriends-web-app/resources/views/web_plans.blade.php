@extends('layout.app')

@section('title', 'Reyes&Friends - Planes Web Personalizados para tu Negocio')
@section('description', 'Descubre nuestros planes web diseñados para impulsar tu negocio al siguiente nivel. Soluciones digitales innovadoras y personalizadas. ¡Transforma tu empresa hoy!')
@section('keywords', 'planes web, desarrollo web, diseño web, soluciones digitales, aplicaciones móviles, software a medida, chile')

@section('content')
    <section class="relative w-full h-[70vh] flex items-center justify-center bg-cover bg-center overflow-hidden">
            <img src="{{ asset('img/background/background-web.jpg') }}" alt="Ilustración de fondo" class="absolute inset-0 w-full h-full object-cover pointer-events-none grayscale" />
            <div class="absolute inset-0 bg-red-950/90"></div>
            <div class="relative z-10 container mx-auto flex flex-col md:flex-row items-center h-full px-6 gap-8">
                <div class="w-full md:w-1/2 flex justify-center" data-aos="fade-right" data-aos-duration="1200">
                    <img src="{{ asset('img/web_plans/web_plans.png') }}" alt="Solución digital" class="w-3/4 h-auto drop-shadow-xl pointer-events-none" />
                </div>
                <div class="w-full md:w-1/2 text-white space-y-6" data-aos="fade-left" data-aos-duration="1200">
                    <h1 class="text-5xl md:text-6xl font-bold mb-4 drop-shadow-lg" data-aos="fade-down" data-aos-delay="200" data-aos-easing="ease-in-out" data-aos-duration="1200">Cotiza tu Plan Web</h1>
                    <p class="text-2xl md:text-3xl text-red-600 mb-6 drop-shadow font-medium" data-aos="fade-up" data-aos-delay="400" data-aos-easing="ease-in-out" data-aos-duration="1200">Personalizable y adaptable a tus necesidades</p>
                    <p class="text-lg md:text-xl text-gray-200 leading-relaxed font-medium" data-aos="fade-up" data-aos-delay="600" data-aos-easing="ease-in-out" data-aos-duration="1200">¡Lleva tu presencia online al siguiente nivel con nuestros planes web por suscripción mensual! Personaliza el diseño, agrega contenido nuevo cada mes y olvídate de lo técnico: nosotros nos encargamos del hosting, mantenimiento y soporte. Tú solo enfócate en crecer, nosotros hacemos el resto.</p>
                </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl mb-12 text-center relative">
                <span class="bg-zinc-900 px-4 relative z-10 text-white">Lista de Planes Web</span>
                <div class="absolute left-0 right-0 top-1/2 h-0.5 bg-red-700 -z-0"></div>
            </h2>
            <div class="space-y-12">
                    @foreach($webPlans as $webPlan)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12 p-12 items-start" data-aos="zoom-in" data-aos-delay="{{ 200 + ($loop->index * 100) }}">
                        <div class="flex flex-col justify-center">
                            @if($webPlan->images && count($webPlan->images) > 0)
                                <img
                                    src="{{ $webPlan->images[0]->image_url }}"
                                    alt="Mockup del plan {{ $webPlan->name }}"
                                    class="rounded shadow-xl w-full max-w-2xl aspect-[16/9] object-cover pointer-events-none mb-6"
                                />
                            @endif
                        </div>
                        <div class="flex flex-col justify-center">
                            <h3 class="text-3xl md:text-5xl text-white mb-4 font-bold">
                                Plan <span class="text-red-600">{{ $webPlan->name }}</span>
                            </h3>
                            <h2 class="text-xl text-white mb-6 font-semibold">
                                ${{ number_format($webPlan->price_clp, 0, ',', '.') }}/mes
                            </h2>
                            <p class="text-xl text-gray-200 mb-6">
                                {{ $webPlan->description }}
                            </p>
                            <a
                                href="{{ route('web_plans.show', $webPlan->slug) }}"
                                class="bg-red-800 hover:bg-red-900 text-white px-6 sm:px-8 py-3 sm:py-4 rounded transition-all duration-300 inline-flex items-center gap-3 font-semibold hover:scale-105 text-base sm:text-lg w-fit"
                            >
                                Ver Detalles
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
@endsection