<?php

use App\Http\Controllers\ContactController;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ============================================================
// RUTAS EXISTENTES DE TU TIENDA
// ============================================================

// La puerta de entrada
Route::redirect('/', '/inicio');


// Inicio con productos
Route::get('/inicio', function () {
    $productos = [
        ['nombre' => 'Manta de Alpaca', 'precio' => 26],
        ['nombre' => 'Café de Yungas', 'precio' => 28],
        ['nombre' => 'Collar Artesanal', 'precio' => 25],
        ['nombre' => 'Charango Profesional', 'precio' => 18],
        ['nombre' => 'Artesanía en Plata', 'precio' => 35],
        ['nombre' => 'Miel de Abeja', 'precio' => 15],
        ['nombre' => 'Poncho de Lana', 'precio' => 45],
        ['nombre' => 'Chocolates de Bolivia', 'precio' => 20],
    ];
    return view('inicio', ['productos' => $productos]);
});


// ============================================================
// RUTAS DE CONTACTO (UNA VEZ CADA UNA)
// ============================================================

// Mostrar formulario de contacto
Route::get('/contacto', [ContactController::class, 'index'])->name('contact.index');

// Procesar formulario de contacto
Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');

// ============================================================
// RUTAS DE PRODUCTOS (LAS QUE YA TENÍAS)
// ============================================================

// Listar productos (público)
Route::get('/productos', function () {
    $productos = Producto::all();
    return view('productos', ['productos' => $productos]);
});

// Formulario nuevo producto (solo autenticado)
Route::get('/productos/nuevo', function () {
    return view('productos-nuevo');
})->middleware('auth');

// Guardar nuevo producto (solo autenticado)
Route::post('/productos/nuevo', function () {
    request()->validate([
        'nombre' => 'required',
        'precio' => 'required|integer',
    ], [
        'nombre.required' => 'El nombre no puede quedar vacío.',
        'precio.required' => 'El precio no puede quedar vacío.',
        'precio.integer' => 'El precio tiene que ser un número entero, sin letras.',
        'stock.required' => 'La cantidad en stock no puede quedar vacía.',
    ]);

    Producto::create([
        'nombre' => request()->input('nombre'),
        'precio' => request()->input('precio'),
        'stock' => request()->input('stock'),
    ]);

    return redirect('/productos');
})->middleware('auth');

// ============================================================
// RUTAS DE AUTENTICACIÓN (CANDADO Y PUBLICACIÓN)
// ============================================================

// Mostrar login
Route::get('/login', function () {
    return view('login');
});

// Procesar login
Route::post('/login', function () {
    $credenciales = [
        'email' => request()->input('email'),
        'password' => request()->input('password'),
    ];

    if (Auth::attempt($credenciales)) {
        request()->session()->regenerate();
        return redirect('/panel');
    }

    return back()->with('error', 'Correo o contraseña incorrectos.');
});

// Cerrar sesión
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/inicio');
});

// Panel privado
Route::get('/panel', function () {
    $productos = Producto::all();
    return view('panel', ['productos' => $productos]);
})->middleware('auth');

// ELIMINAR PRODUCTO
Route::delete('/productos/{id}/eliminar', function ($id) {

    // Buscar el producto por ID
    $producto = App\Models\Producto::find($id);
    
    // Verificar que existe
    if (!$producto) {
        return redirect('/productos')->with('error', 'Producto no encontrado.');
    }
    
    // Guardar el nombre para el mensaje
    $nombre = $producto->nombre;
    
    // Eliminar
    $producto->delete();
    
    // Redireccionar con mensaje de éxito
    return redirect('/productos')->with('success', "Producto '$nombre' eliminado correctamente.");
})->middleware('auth'); // Solo usuarios autenticados
