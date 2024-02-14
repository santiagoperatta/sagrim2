@component('mail::message')
# Has recibido una nueva observación en tu trámite

Se ha creado una nueva observación en tu trámite.

@component('mail::button', ['url' => route('dashboard')])
Ver Trámite
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent