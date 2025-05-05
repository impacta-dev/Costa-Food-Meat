@component('mail::message')
# Nuevo contacto

Hola. Alguien ha rellenado el formulario de contacto de <a href="https://www.costafoodmeat.com" style="white-space: nowrap;">www.costafoodmeat.com</a>. Puedes escribirle respondiendo a este mismo mensaje.

@component('mail::panel')

@if(isset($data['name']))* **Nombre**: {{ $data['name'] }}@endif

@if(isset($data['email']))* **Email**: {{ $data['email'] }}@endif

@if(isset($data['subject']))* **Asunto**: {{ $data['subject'] }}@endif


@if(isset($data['message']))**Mensaje**:

{{ $data['message'] }}@endif

@endcomponent

<img src="{{ config('app.url') }}/img/emails/logo.jpg" alt="Logo Costa Food Meat" style="display: block; margin: 0 auto;">

@endcomponent