@extends('layout.app')

@section('title', 'Reyes&Friends - Como Funcionan nuestros Servicios de Desarrollo Web y Software a Medida')
@section('description', 'Descubre cómo funcionan nuestros servicios de desarrollo web, aplicaciones móviles y software a medida. Conoce nuestro proceso de trabajo, desde la planificación hasta la entrega final, y cómo podemos ayudarte a transformar tu negocio con soluciones digitales innovadoras. ¡Impulsa tu empresa al siguiente nivel con Reyes&Friends!')
@section('keywords', 'como funciona, desarrollo web, software a medida, aplicaciones móviles, proceso de trabajo, soluciones digitales, empresa, negocios, tecnología, chile')

@section('content')
    <section class="relative w-full h-[70vh] flex items-center justify-center bg-cover bg-center overflow-hidden">
        <img src="{{ asset('img/background/background-web.jpg') }}" alt="Ilustración de fondo" class="absolute inset-0 w-full h-full object-cover pointer-events-none grayscale" />
        <div class="absolute inset-0 bg-red-950/90"></div>
        <div class="relative z-10 container mx-auto flex flex-col md:flex-row items-center h-full px-6 gap-8">
            <div class="w-full md:w-1/2 text-white space-y-6">
                <h1 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg">¿Cómo Funcionan Nuestros Servicios?</h1>
                <p class="text-1xl md:text-2xl text-red-600 mb-6 drop-shadow font-medium">Lo que usted necesita, nos encargamos.</p>
                <p class="text-lg md:text-xl text-gray-200 leading-relaxed font-medium">Ofrecemos dos opciones: contratar uno de nuestros <a href="{{ route('web_plans') }}"><strong class="text-red-700 hover:underline">Planes Web Personalizados</strong></a> o solicitar una cotización a medida. Nuestro equipo entiende sus necesidades y crea soluciones digitales que impulsan su negocio.</p>
            </div>
            <div class="w-full md:w-1/2 flex justify-center">
                <img src="{{ asset('img/how_works/how_works.png') }}" alt="Proceso de trabajo" class="w-3/4 h-auto drop-shadow-xl pointer-events-none" />
            </div>
        </div>
    </section>

@endsection