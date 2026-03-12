<x-mail::message>
# Hola {{ $firstName }} {{ $lastName }},

Recibimos tu mensaje correctamente. Gracias por contactar a {{ config('app.name') }}.

Tu solicitud fue registrada con este mensaje:

<x-mail::panel>
{{ $message }}
</x-mail::panel>

Nuestro equipo te respondera lo antes posible.

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
