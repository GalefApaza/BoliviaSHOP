<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Muestra el formulario de contacto
    public function index()
    {
        return view('contacto'); //importante: el nombre de la vista
    }

    // Guarda los datos en la base de datos
    public function store(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingresa un correo electrónico válido.',
            'message.required' => 'El mensaje no puede estar vacío.',
            'message.min' => 'El mensaje debe tener al menos 10 caracteres.',
        ]);

        // Guardar en la base de datos
        Contact::create($validated);

        // Redireccionar con mensaje de éxito
        return redirect()->back()->with('success', '¡Mensaje enviado y guardado correctamente!');
    }
}