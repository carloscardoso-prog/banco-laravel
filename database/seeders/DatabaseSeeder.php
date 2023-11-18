<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\TransacaoSeeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TransacaoSeeder::class,
        ]);
    }
}
