@component('mail::message')
# Nueva solicitud de información

Hola. Alguien ha solicitado más información acerca del producto <strong><a href="{{ $data['product_url'] }}" target="_blank">{{ $data['product_name'] }} (Ref. {{ $data['product_ref'] }})</a></strong>. Puedes escribirle respondiendo a este mismo mensaje.

@component('mail::panel')

@if(isset($data['name']))* **Nombre**: {{ $data['name'] }}@endif

@if(isset($data['email']))* **Email**: {{ $data['email'] }}@endif

@if(isset($data['phone']))* **Teléfono**: {{ $data['phone'] }}@endif

@if(isset($data['address']))* **Dirección**: {{ $data['address'] }}@endif

@if(isset($data['cp']))* **C.P.**: {{ $data['cp'] }}@endif

@if(isset($data['country']))* **País**: {{ $data['country'] }}@endif


@if(isset($data['message']))**Mensaje**:

{{ $data['message'] }}@endif

@endcomponent

<img src="{{ config('app.url') }}/img/emails/logo.jpg" alt="Logo Costa Food Meat" style="display: block; margin: 0 auto;">

@endcomponent