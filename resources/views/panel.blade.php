{{-- CANDADO Y PUBLICACIÓN — clase 13
     La primera página PRIVADA del curso. Nadie llega acá sin haber pasado por /login:
     el candado no está en esta vista, está en la ruta. --}}
     
@extends('layouts.base')

@section('contenido')
  {{-- auth()->user() es "quién está adentro ahora mismo". Es el objeto User
       que salió de la tabla users, así que se le piden sus columnas con flecha. --}}
  <h2>Bienvenido, {{ auth()->user()->name }}</h2>

  <p>Entraste con <strong>{{ auth()->user()->email }}</strong>. Esta página solo esta disponible para quien inició sesión.</p>

  <h3>Tus productos Disponibles son: ({{ count($productos) }})</h3>
@endsection
