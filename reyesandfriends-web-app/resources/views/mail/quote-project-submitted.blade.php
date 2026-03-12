<x-mail::message>
# Hola, {{ $client_name }}!

Tu solicitud de cotización de proyecto ha sido recibida.
Nuestro equipo revisará los detalles y se pondrá en contacto contigo lo antes posible.

Un resumen de tu solicitud:
- **Nombre del proyecto:** {{ $name }}
- **Descripción:** {{ $description }}
- **Información adicional:** {{ $extra_info }}

Vamos a analizar tu solicitud al detalle y nos comunicaremos contigo para discutir los próximos pasos.

Te enviaremos un correo electrónico a **{{ $client_email }}** o te llamaremos al **{{ $client_phone }}** si necesitamos más información.

Te responderemos en el menor tiempo posible.

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
