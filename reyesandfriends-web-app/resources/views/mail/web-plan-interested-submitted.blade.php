<x-mail::message>
# Hola, {{ $first_name }} {{ $last_name }}!

Tu interés en nuestro plan web ha sido recibido correctamente.
Nuestro equipo revisará tu solicitud y te contactará a la brevedad.

Resumen de tu solicitud:

<x-mail::panel>
- **Plan web:** {{ $web_plan_name }}
- **Correo de contacto:** {{ $client_email }}
- **Celular:** {{ $cellphone }}
</x-mail::panel>

Si necesitamos información adicional, te escribiremos a **{{ $client_email }}**.

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
