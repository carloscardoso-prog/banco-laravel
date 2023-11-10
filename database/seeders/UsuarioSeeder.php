<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'usuario' => 'carloscardoso',
            'senha' => '123carlos',
            'nome' => 'Carlos Eduardo',
            'saldo' => '50.00',
        ]);

        Usuario::create([
            'usuario' => 'fabiolopes',
            'senha' => '123fabio',
            'nome' => 'Fabio Silmarovi',
            'saldo' => '50.00',
        ]);
    }
}
