@component('mail::message')
# Introdução

Corpo da mensagem

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
