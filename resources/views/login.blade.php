{{-- CANDADO Y PUBLICACIÓN — clase 13
     La puerta de la tienda. Es un formulario como el de productos: mismo @csrf,
     mismo method="POST". Lo único distinto es qué hace el servidor con lo que llega. --}}
@extends('layouts.base')

@section('contenido')
  <h2>Entrar al panel</h2>

  {{-- Si el intento anterior falló, la ruta nos mandó el mensaje "en el bolsillo"
       de la sesión. Se muestra una vez y desaparece solo. --}}
  @if (session('error'))
    <p style="color: #b00020;"><strong>{{ session('error') }}</strong></p>
  @endif

  <form action="/login" method="POST">

    {{-- LA FIRMA SECRETA. Laravel pone acá un token único de ESTA página y de
         ESTE visitante, y al recibir el POST lo compara. Sirve para que nadie
         pueda mandarte un formulario desde otro sitio haciéndose pasar por vos.
         Sin @csrf, Laravel rechaza el envío con un error 419. --}}
    @csrf

    <p>
      <label for="email">Correo:</label><br>
      <input type="email" id="email" name="email" required>
    </p>

    <p>
      {{-- type="password" solo tapa las letras en pantalla. Lo que protege
           de verdad es que del otro lado la contraseña está hasheada. --}}
      <label for="password">Contraseña:</label><br>
      <input type="password" id="password" name="password" required>
    </p>

    <p><button type="submit">Entrar</button></p>
  </form>
@endsection
