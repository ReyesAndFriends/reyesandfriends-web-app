@extends('layout.app')

@section('title', 'Reyes&Friends - Trabajo en Progreso')
@section('description', 'Esta URL se encuentra en desarrollo. Estamos trabajando para ofrecerte la mejor experiencia. ¡Pronto estará disponible!')
@section('keywords', 'trabajo en progreso, desarrollo web, diseño web, soluciones digitales, aplicaciones móviles, software a medida, chile')

@section('content')
    <section class="relative w-full h-[70vh] flex items-center justify-center bg-cover bg-center overflow-hidden">
        <img src="{{ asset('img/background/background-web.jpg') }}" alt="Ilustración de fondo" class="absolute inset-0 w-full h-full object-cover pointer-events-none grayscale" />
        <div class="absolute inset-0 bg-red-950/90"></div>
        <div class="relative z-10 container mx-auto flex flex-col items-center justify-center h-full px-6 text-center">
            <div class="text-white space-y-8" data-aos="fade-down" data-aos-duration="1200">
                <h1 class="text-5xl md:text-6xl font-bold drop-shadow-lg">Trabajo en Progreso</h1>
                <p class="text-xl md:text-2xl text-gray-200 leading-relaxed font-medium">Estamos trabajando duro para ofrecerte la mejor experiencia. ¡Pronto estará disponible!</p>
                <a href="{{ route('home') }}" class="inline-block bg-red-800 hover:bg-red-900 text-white font-bold py-3 px-8 rounded text-lg transition">
                    Volver al Inicio
                    <i class="fas fa-home ml-2"></i>
                </a>
            </div>
        </div>
    </section>
@endsection