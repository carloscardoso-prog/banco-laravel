<?php

namespace Database\Seeders;

use App\Models\Transacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransacaoSeeder extends Seeder
{
    public function run(): void
    {
        Transacao::create([
            'valor_envio' => '5.00',
            'conta_remetente' => '1',
            'conta_destinatario' => '2'
        ]);
    }
}
