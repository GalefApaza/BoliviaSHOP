@extends('layouts.base')

@section('contenido')
    <h2>📧 Contáctanos</h2>
    
    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert-success">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Mensajes de error de validación --}}
    @if($errors->any())
        <div class="alert-error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>❌ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        
        <div>
            <label for="name">👤 Nombre:</label>
            <input type="text" 
                   name="name" 
                   id="name" 
                   value="{{ old('name') }}" 
                   placeholder="Escribe tu nombre"
                   required>
        </div>
        
        <div>
            <label for="email">📧 Correo Electrónico:</label>
            <input type="email" 
                   name="email" 
                   id="email" 
                   value="{{ old('email') }}" 
                   placeholder="tucorreo@ejemplo.com"
                   required>
        </div>
        
        <div>
            <label for="message">💬 Mensaje:</label>
            <textarea name="message" 
                      id="message" 
                      rows="5" 
                      placeholder="Escribe tu mensaje aquí..."
                      required>{{ old('message') }}</textarea>
        </div>
        
        <button type="submit">📨 Enviar Mensaje</button>
    </form>
@endsection