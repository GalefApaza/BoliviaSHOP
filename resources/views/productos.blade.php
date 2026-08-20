@extends('layouts.base')

@section('contenido')
    <h2>📦 Nuestros productos</h2>

    <p>Hay <strong>{{ count($productos) }}</strong> productos guardados en la base de datos 😊</p>

    <ul>
        @foreach ($productos as $producto)
            <li>
                {{ $producto->nombre }} — Bs {{ $producto->precio }}
                
                {{-- Botón de eliminar (solo para usuarios autenticados) --}}
                @auth
                    <form action="/productos/{{ $producto->id }}/eliminar" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                style="background: #e74c3c; color: white; border: none; padding: 2px 10px; border-radius: 4px; cursor: pointer; font-size: 12px;"
                                onclick="return confirm('¿Seguro que quieres eliminar {{ $producto->nombre }}?')">
                            ❌ Eliminar
                        </button>
                    </form>
                @endauth
            </li>
        @endforeach
    </ul>

    @auth
        <p><a href="/productos/nuevo">➕ Agregar un producto</a></p>
    @endauth

    @guest
        <p style="color: #666; font-style: italic;">🔒 Inicia sesión para administrar productos</p>
    @endguest
@endsection
