<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // ============================================================
        // PRODUCTOS DE BOLISHOP - Los mismos de la imagen de referencia
        // ============================================================
        Producto::create(['nombre' => 'Manta de Alpaca', 'precio' => 26]);
        Producto::create(['nombre' => 'Café de Yungas', 'precio' => 28]);
        Producto::create(['nombre' => 'Collar Artesanal', 'precio' => 25]);
        Producto::create(['nombre' => 'Charango Profesional', 'precio' => 18]);
        Producto::create(['nombre' => 'Artesanía en Plata', 'precio' => 35]);
        Producto::create(['nombre' => 'Miel de Abeja', 'precio' => 15]);
        Producto::create(['nombre' => 'Poncho de Lana', 'precio' => 45]);
        Producto::create(['nombre' => 'Chocolates de Bolivia', 'precio' => 20]);

        // ============================================================
        // USUARIO ADMIN - Para acceder al panel
        // ============================================================
        User::firstOrCreate(
            ['email' => 'jgalef15@gmail.com'],
            ['name' => 'Galef', 'password' => Hash::make('josue1234')],
        );
    }
}