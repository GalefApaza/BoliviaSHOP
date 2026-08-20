@extends('layouts.base')

@section('contenido')
    <h2>Agregar un producto</h2>

    @if ($errors->any())
        <ul style="color: #b00020; background: #f8d7da; padding: 10px; border-radius: 4px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="/productos/nuevo" method="POST">
        @csrf

        <div>
            <label for="nombre">Nombre del producto:</label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
        </div>

        <div>
            <label for="precio">Precio en Bs:</label>
            <input type="number" id="precio" name="precio" value="{{ old('precio') }}" required>
        </div>

        {{-- NUEVO CAMPO: STOCK --}}
        <div>
            <label for="stock">Cantidad en Stock:</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock', 0) }}" required min="0">
        </div>

        <button type="submit">Guardar producto</button>
    </form>

    <p><a href="/productos">&larr; Volver a la lista</a></p>
@endsection