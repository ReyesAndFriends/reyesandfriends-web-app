<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'Reyes&Friends'))</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>
    <body class="flex flex-col min-h-screen bg-zinc-900 text-white">
        @include('layout.components.header')

        <main class="flex-grow">
            <div class="w-full flex justify-center px-4">
                <div class="w-full max-w-7xl">
                    @yield('content')
                </div>
            </div>
        </main>

        @include('layout.components.footer')
        
        @stack('scripts')
    </body>
</html>
