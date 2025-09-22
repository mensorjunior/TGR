<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Produto;
use App\Models\Pedido;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria Usuário com role Admin
        // User::factory()->create([
        //     'name' => 'Admin', 
        //     'email' => 'admin@example.com', 
        //     'password' => Hash::make('password'), 
        //     'role' => 'admin'
        // ]);

        // Cria Usuário com role Cliente
        // User::factory()->create([
        //     'name' => 'Cliente', 
        //     'email' => 'cliente@example.com', 
        //     'password' => Hash::make('password'), 
        //     'role' => 'cliente'
        // ]);

        // Cria 10 produtos
        Produto::factory(10)->create();
    }
}