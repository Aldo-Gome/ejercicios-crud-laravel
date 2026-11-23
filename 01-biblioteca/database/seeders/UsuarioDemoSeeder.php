<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioDemoSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['usuario' => 'admin'],
            [
                'name' => 'Administrador de biblioteca',
                'email' => 'admin@biblioteca.test',
                'password' => Hash::make('12345678'),
            ]
        );
    }
}
