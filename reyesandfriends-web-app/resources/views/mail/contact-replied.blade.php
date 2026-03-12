<x-mail::message>
# Hola {{ $clientName }},

Aquí está la respuesta a tu mensaje de contacto:

<x-mail::panel>
{{ $replyMessage }}
</x-mail::panel>

Tu mensaje original fue:

<x-mail::panel>
{{ $clientContactMessage }}
</x-mail::panel>


Cualquier pregunta adicional, puedes volver a realizar tu consulta en nuestra página de contacto.

Te ha hablado {{ $responderName }} **({{ $responderEmail }})**.

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
