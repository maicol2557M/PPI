<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'id_cedula' => '123456789',
            'nombre' => 'Administrador',
            'correo_electronico' => 'admin@example.com',
            'password' => Hash::make('123456'),
        ]);

        User::create([
            'id_cedula' => '987654321',
            'nombre' => 'Usuario Prueba',
            'correo_electronico' => 'test@example.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
