@component('mail::message')
# Nueva sugerencia de mejora

Hola. Alguien ha rellenado el formulario de sugerencias de mejora de <a href="https://www.costafoodmeat.com" style="white-space: nowrap;">www.costafoodmeat.com</a>.

@component('mail::panel')

@if (isset($data['name_and_surname']))* **Nombre y apellidos**: {{ $data['name_and_surname'] }}@endif

@if (isset($data['department']))* **Departamento**: {{ $data['department'] }}@endif

@if (isset($data['date']))* **Fecha**: {{ $data['date'] }}@endif

@if (isset($data['section']))* **Sección**: {{ $data['section'] }}@endif

@if (isset($data['current_situation_desc']))* **Descripción de la situación actual**: {{ $data['current_situation_desc'] }}@endif

@if (isset($data['proposed_solution']))* **Propuesta de solución**: {{ $data['proposed_solution'] }}@endif

@if (isset($data['expected_improvement']))* **Mejora esperada**: {{ $data['expected_improvement'] }}@endif

@endcomponent

<img src="{{ config('app.url') }}/img/emails/logo.jpg" alt="Logo Costa Food Meat" style="display: block; margin: 0 auto;">

@endcomponent
