<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Adăugare utilizator normal
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role' => 'user',
        ]);

        // Adăugare utilizator admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'grama.developer@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin', // Asigură-te că setezi rolul 'admin' aici
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
