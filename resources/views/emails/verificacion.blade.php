<x-mail::message>
# Introduction

Te haz registrado en Look!.
Para completar tu registro, haz clic en el botón de abajo para verificar tu dirección de correo electrónico.

<x-mail::button :url="route('verification.verify', $user->id)"> # La ruta necesita el id del usuario y lo de verfification.verify es la ruta que se creo en el archivo web.php
Verificar Correo
</x-mail::button>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
