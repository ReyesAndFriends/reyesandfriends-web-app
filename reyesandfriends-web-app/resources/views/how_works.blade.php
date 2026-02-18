@extends('layout.app')

@section('title', 'Reyes&Friends - Como Funcionan nuestros Servicios de Desarrollo Web y Software a Medida')
@section('description', 'Descubre cómo funcionan nuestros servicios de desarrollo web, aplicaciones móviles y software a medida. Conoce nuestro proceso de trabajo, desde la planificación hasta la entrega final, y cómo podemos ayudarte a transformar tu negocio con soluciones digitales innovadoras. ¡Impulsa tu empresa al siguiente nivel con Reyes&Friends!')
@section('keywords', 'como funciona, desarrollo web, software a medida, aplicaciones móviles, proceso de trabajo, soluciones digitales, empresa, negocios, tecnología, chile')

@section('content')

    <section class="relative w-full h-[70vh] flex items-center justify-center bg-cover bg-center overflow-hidden">
        <img src="{{ asset('img/background/background-web.jpg') }}" alt="Ilustración de fondo" class="absolute inset-0 w-full h-full object-cover pointer-events-none grayscale" />
        <div class="absolute inset-0 bg-red-950/90"></div>
        <div class="relative z-10 container mx-auto flex flex-col md:flex-row items-center h-full px-6 gap-8">
            <div class="w-full md:w-1/2 text-white space-y-6" data-aos="fade-right" data-aos-duration="1200">
                <h1 class="text-5xl md:text-6xl font-bold mb-4 drop-shadow-lg" data-aos="fade-down" data-aos-delay="200" data-aos-easing="ease-in-out" data-aos-duration="1200">¿Cómo Funcionan Nuestros Servicios?</h1>
                <p class="text-2xl md:text-3xl text-red-600 mb-6 drop-shadow font-medium" data-aos="fade-up" data-aos-delay="400" data-aos-easing="ease-in-out" data-aos-duration="1200">tu solución digital innovadora</p>
                <p class="text-lg md:text-xl text-gray-200 leading-relaxed font-medium" data-aos="fade-up" data-aos-delay="600" data-aos-easing="ease-in-out" data-aos-duration="1200">Transforma tu negocio con tecnología a tu medida! Desarrollamos sitios web con contenido atractivo y actualizable, plataformas digitales y soluciones personalizadas para que tu empresa crezca y destaque en el mundo digital.</p>
            </div>
            <div class="w-full md:w-1/2 flex justify-center" data-aos="fade-left" data-aos-duration="1200">
                <img src="{{ asset('img/how_works/ilustration.png') }}" alt="Proceso de trabajo" class="w-3/4 h-auto drop-shadow-xl pointer-events-none robot-fade-mask" />
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl mb-12 text-center relative">
                <span class="bg-zinc-900 px-4 relative z-10 text-white">¿Cómo Operamos?</span>
                <div class="absolute left-0 right-0 top-1/2 h-0.5 bg-red-700 -z-0"></div>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="rounded border border-zinc-800 hover:border-red-700 p-6 flex flex-col items-center text-center transition" data-aos="zoom-in" data-aos-delay="200" data-aos-once="true">
                    <i class="fas fa-phone text-4xl text-red-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Contacto Inicial</h3>
                    <p class="text-white">Puedes contactarnos a través de nuestros <a href="{{ route('web_plans') }}" class="text-red-600 hover:underline font-semibold">Planes Web</a>, o también puedes utilizar nuestro <a href="{{ route('contact') }}" class="text-red-600 hover:underline font-semibold">Formulario de Contacto</a>. Nuestro equipo se pondrá en contacto contigo para entender tus necesidades y objetivos, y así poder ofrecerte la mejor solución digital a medida.</p>
                </div>
                <div class="rounded border border-zinc-800 hover:border-red-700 p-6 flex flex-col items-center text-center transition" data-aos="zoom-in" data-aos-delay="300" data-aos-once="true">
                    <i class="fas fa-clipboard-list text-4xl text-red-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Propuesta y Planificación</h3>
                    <p class="text-white">Una vez ya teniendo una comprensión clara de tus necesidades, generaremos una propuesta de cotización detallada que incluirá el alcance del proyecto, los plazos de entrega y los costos asociados. Trabajaremos contigo para ajustar la propuesta según sea necesario, asegurándonos de que se alinee perfectamente con tus expectativas y objetivos comerciales.</p>
                </div>
                <div class="rounded border border-zinc-800 hover:border-red-700 p-6 flex flex-col items-center text-center transition" data-aos="zoom-in" data-aos-delay="400" data-aos-once="true">
                    <i class="fas fa-code text-4xl text-red-600 mb-4"></i>
                    <h3 class="text-xl font-semibold mb-2">Desarrollo y Entrega</h3>
                    <p class="text-white">Cuando tu proyecto esté aprobado, nuestro equipo de expertos comenzará el proceso de desarrollo utilizando metodologías ágiles para garantizar una comunicación constante y una entrega eficiente. Finalmente, te avisaremos cuando tu solución digital esté lista para su lanzamiento, asegurándonos de que todo funcione perfectamente y cumpla con tus expectativas antes de la entrega final.</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mt-16">
                <div class="flex flex-col justify-center" data-aos="fade-right" data-aos-delay="200" data-aos-once="true">
                    <h3 class="text-2xl font-bold mb-4">Nuestro Compromiso</h3>
                    <p class="text-lg text-gray-300 leading-relaxed max-w-3xl" data-aos="fade-up" data-aos-delay="200" data-aos-once="true">
                      Nos tomamos con seriedad y dedicación cada proyecto, trabajando en estrecha colaboración con nuestros clientes para entender sus necesidades y objetivos. Nuestro equipo de expertos se compromete a entregar soluciones digitales de alta calidad que no solo cumplan, sino que superen las expectativas. Desde la planificación hasta la entrega final, nos aseguramos de que cada paso del proceso sea transparente y eficiente, brindando a nuestros clientes una experiencia excepcional y resultados que impulsan su negocio al siguiente nivel.
                    </p>
                </div>
                <div class="flex justify-center" data-aos="fade-left" data-aos-delay="200" data-aos-once="true">
                    <img src="{{ asset('img/how_works/equipo.jpg') }}" alt="Equipo" class="w-2/3 aspect-square object-cover rounded-lg drop-shadow-xl pointer-events-none" />
                </div>
            </div>
        </div>
    </section>

@endsection