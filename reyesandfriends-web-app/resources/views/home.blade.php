@extends('layout.app')

@section('title', 'Reyes&Friends - Desarrollo web, apps y software a medida')
@section('description', 'Desarrollamos páginas web, aplicaciones móviles y software a medida para impulsar tu negocio al siguiente nivel. Soluciones digitales innovadoras, planes web desde $19.990/mes. ¡Transforma tu empresa hoy!')
@section('keywords', 'desarrollo web, software a medida, aplicaciones móviles, diseño web, soluciones digitales, empresa, negocios, tecnología, chile, planes web')

@section('content')
    <section class="relative w-full h-[70vh] flex items-center justify-center bg-cover bg-center overflow-hidden">
        <img src="{{ asset('img/background/background-web.jpg') }}" alt="Ilustración de fondo" class="absolute inset-0 w-full h-full object-cover pointer-events-none grayscale" />
        <div class="absolute inset-0 bg-red-950/90"></div>
        <div class="relative z-10 container mx-auto flex flex-col md:flex-row items-center h-full px-6 gap-8">
            <div class="w-full md:w-1/2 text-white space-y-6">
                <h1 class="text-5xl md:text-6xl font-bold mb-4 drop-shadow-lg">Desarrollamos</h1>
                <p class="text-2xl md:text-3xl text-red-600 mb-6 drop-shadow font-medium">tu solución digital innovadora</p>
                <p class="text-lg md:text-xl text-gray-200 leading-relaxed font-medium">Transforma tu negocio con tecnología a tu medida! Desarrollamos sitios web con contenido atractivo y actualizable, plataformas digitales y soluciones personalizadas para que tu empresa crezca y destaque en el mundo digital.</p>
                <p class="text-xl md:text-3xl text-white drop-shadow font-medium">Planes Web desde <span class="text-2xl md:text-3xl text-red-600">$19.990/mes</span></p>
                <a href="" class="inline-block bg-red-800 hover:bg-red-900 text-white font-bold py-3 px-8 rounded text-lg transition">Cotiza tu Plan Web</a>
                </div>
            <div class="w-full md:w-1/2 flex justify-center">
                <img src="{{ asset('img/home/desktop.png') }}" alt="Solución digital" class="w-3/4 h-auto drop-shadow-xl pointer-events-none" />
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-medium text-center mb-12">Nuestros Servicios</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div class="rounded border border-zinc-800 hover:border-red-700 p-6 flex flex-col items-center text-center transition">
                        @if($service->icon)
                            <i class="fa {{ $service->icon }} text-4xl mb-4 text-red-800"></i>
                        @endif
                        <h3 class="text-xl font-semibold mb-2">{{ $service->name }}</h3>
                        <p class="text-white">{{ $service->description }}</p>
                        <a href="" class="text-red-600 hover:underline font-semibold mt-4">Mas información</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
@endsection