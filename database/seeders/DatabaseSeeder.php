<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Crear un usuario con contraseña hash
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@domain.com',
            'password' => Hash::make('123456'), // Hash de la contraseña
        ]);

        // Otras creaciones de registros en la base de datos
    }
}
