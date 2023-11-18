<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'password' => '$2y$12$RSyENhIncX6a09Qbx/G89OH6mT6bmG9tGGpoXLo5U37GN.CSsH.7q',
            'email' => 'admin@admin.com',
            'saldo' => '50.00'
        ]);

        User::create([
            'name' => 'admin2',
            'password' => '$2y$12$RSyENhIncX6a09Qbx/G89OH6mT6bmG9tGGpoXLo5U37GN.CSsH.7q',
            'email' => 'admin2@admin.com',
            'saldo' => '50.00'
        ]);
    }
}
