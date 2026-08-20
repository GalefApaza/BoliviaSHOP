@extends('layouts.base')

@section('contenido')
    <h2>Nuestros productos</h2>

    <p>Hay <strong>{{ count($productos) }}</strong> productos guardados en la base de datos 😊</p>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background: #2c3e50; color: white;">
                <th style="padding: 10px; text-align: left;">Producto</th>
                <th style="padding: 10px; text-align: right;">Precio (Bs)</th>
                <th style="padding: 10px; text-align: center;">Stock</th>  {{-- NUEVA COLUMNA --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 10px;">{{ $producto->nombre }}</td>
                    <td style="padding: 10px; text-align: right;">Bs {{ $producto->precio }}</td>
                    <td style="padding: 10px; text-align: center;">
                        @if($producto->stock > 0)
                            <span style="color: green;">✅ {{ $producto->stock }}</span>
                        @else
                            <span style="color: red;">❌ {{ $producto->stock }}</span>
                        @endif
                    </td>  {{-- NUEVA COLUMNA --}}
                </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 20px;"><a href="/productos/nuevo">+ Agregar un producto</a></p>
@endsection