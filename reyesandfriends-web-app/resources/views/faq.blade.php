@extends('layout.app')

@section('title', 'Reyes&Friends - Preguntas Frecuentes sobre Nuestros Servicios de Desarrollo Web y Software a Medida')
@section('description', 'Encuentra respuestas a las preguntas más frecuentes sobre nuestros servicios de desarrollo web, aplicaciones móviles y software a medida. Descubre cómo podemos ayudarte a transformar tu negocio con soluciones digitales innovadoras, y cómo nuestro equipo de expertos trabaja para ofrecerte resultados excepcionales. ¡Resuelve tus dudas y conoce más sobre Reyes&Friends!')
@section('keywords', 'como funciona, desarrollo web, software a medida, aplicaciones móviles, proceso de trabajo, soluciones digitales, empresa, negocios, tecnología, chile')

@section('content')

    <section class="relative w-full h-[70vh] flex items-center justify-center bg-cover bg-center overflow-hidden">
        <img src="{{ asset('img/background/background-web.jpg') }}" alt="Ilustración de fondo" class="absolute inset-0 w-full h-full object-cover pointer-events-none grayscale" />
        <div class="absolute inset-0 bg-red-950/90"></div>
        <div class="relative z-10 container mx-auto flex flex-col md:flex-row items-center h-full px-6 gap-8">
            <div class="w-full md:w-1/2 flex justify-center" data-aos="fade-right" data-aos-duration="1200">
                <img src="{{ asset('img/faq/ilustration.png') }}" alt="Ilustración de preguntas frecuentes" class="w-3/4 h-auto drop-shadow-xl pointer-events-none robot-fade-mask" />
            </div>
            <div class="w-full md:w-1/2 text-white space-y-6" data-aos="fade-left" data-aos-duration="1200">
                <h1 class="text-5xl md:text-6xl font-bold mb-4 drop-shadow-lg" data-aos="fade-down" data-aos-delay="200" data-aos-easing="ease-in-out" data-aos-duration="1200">Preguntas Frecuentes sobre Nuestros Servicios</h1>
                <p class="text-lg md:text-xl text-gray-200 leading-relaxed font-medium" data-aos="fade-up" data-aos-delay="600" data-aos-easing="ease-in-out" data-aos-duration="1200">Aquí encontrarás respuestas a las preguntas más comunes sobre nuestros servicios de desarrollo web, aplicaciones móviles y software a medida.</p>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl mb-12 text-center relative">
                <span class="bg-zinc-900 px-4 relative z-10 text-white">Preguntas Frecuentes</span>
                <div class="absolute left-0 right-0 top-1/2 h-0.5 bg-red-700 -z-0"></div>
            </h2>

            <div class="space-y-8 max-w-4xl mx-auto">
                <div data-aos="fade-up" data-aos-delay="200" data-aos-once="true">
                    @forelse ($faqs as $faq)
                        <div class="faq-item rounded border border-zinc-800 hover:border-red-700 p-6 transition mb-4">
                            <button type="button" class="faq-question w-full flex items-center justify-between text-left focus:outline-none" aria-expanded="false">
                                <span class="text-xl font-semibold">{{ $faq->question }}</span>
                                <i class="fa-solid fa-chevron-down text-red-600 transition-transform duration-300"></i>
                            </button>
                            <div class="faq-answer mt-2 hidden">
                                <p class="text-white">{{ $faq->answer }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-400">No hay preguntas frecuentes disponibles en este momento.</p>
                    @endforelse
                </div>

                <p>
                    Para cualquier otra pregunta o consulta, no dudes en contactarnos a través de nuestro <a href="{{ route('contact') }}" class="text-red-600 hover:underline font-semibold">Formulario de Contacto</a>. Nuestro equipo estará encantado de ayudarte y brindarte toda la información que necesites sobre nuestros servicios. ¡Estamos aquí para ayudarte a transformar tu negocio con soluciones digitales innovadoras!
                </p>

            </div>
        </div>

    </section>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.faq-item').forEach(function(item) {
                const questionBtn = item.querySelector('.faq-question');
                const answerDiv = item.querySelector('.faq-answer');
                const icon = questionBtn.querySelector('i');
                item.style.cursor = 'pointer';
                item.addEventListener('click', function(e) {
                    // Evitar que el click en el botón cause doble toggle
                    if (e.target.tagName === 'BUTTON' || e.target.closest('button')) {
                        e.preventDefault();
                    }
                    const isHidden = answerDiv.classList.contains('hidden');
                    answerDiv.classList.toggle('hidden');
                    icon.classList.toggle('fa-chevron-down', !isHidden);
                    icon.classList.toggle('fa-chevron-up', isHidden);
                });
            });
        });
    </script>
@endpush