<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Reyes&Friends'))</title>

        <link rel="canonical" href="{{ url()->current() }}" />

        <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
        <link rel="manifest" href="/site.webmanifest" />

        <meta name="description" content="@yield('description', 'Reyes&Friends - Desarrollamos páginas web, aplicaciones móviles y software a medida para impulsar tu negocio al siguiente nivel.')">
        <meta name="keywords" content="@yield('keywords', 'desarrollo web, software a medida, aplicaciones móviles, diseño web, soluciones digitales, empresa, negocios, tecnología, chile, planes web')">
        <meta name="author" content="Reyes&Friends">
        <meta name="robots" content="index, follow">
        <meta property="og:title" content="@yield('title', config('app.name', 'Reyes&Friends'))">
        <meta property="og:description" content="@yield('description', '¡Impulsa tu negocio con tecnología de vanguardia! Creamos páginas web, apps y software a medida para que tu empresa crezca, destaque y conquiste el mundo digital. Solicita tu plan web hoy y da el siguiente paso hacia el éxito.')">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ asset('img/og-image.png') }}">
        <meta property="og:image:alt" content="Reyes&Friends - Desarrollo web y software a medida">
        <meta name="twitter:image" content="{{ asset('img/og-image.png') }}">
        <meta name="twitter:image:alt" content="Reyes&Friends - Desarrollo web y software a medida">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('title', config('app.name', 'Reyes&Friends'))">
        <meta name="twitter:description" content="@yield('description', '¡Impulsa tu negocio con tecnología de vanguardia! Creamos páginas web, apps y software a medida para que tu empresa crezca, destaque y conquiste el mundo digital. Solicita tu plan web hoy y da el siguiente paso hacia el éxito.')">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>
    <body class="flex flex-col min-h-screen bg-zinc-900 text-white">
        @include('layout.components.header')

        <main class="flex-1">
            <div class="w-full flex justify-center">
                <div class="w-full">
                    
                    @include('layout.components.app_alerts')
                    @yield('content')
                </div>
            </div>
        </main>

        @include('layout.components.footer')
        
        @include('layout.components.whatsapp_button')
        @stack('scripts')
        @include('components.cookies_modal')
    </body>
</html>
