@component('mail::message')
# Link de Recuperação de Senha
 
validade de 1 hora!
 
@component('mail::button', ['url' => $link])
Recuperar a Senha
@endcomponent
 
Equipe,<br>
{{ config('app.name') }}
@endcomponent