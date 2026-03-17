<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user Admin
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'], 
            [
                'name' => 'Admin News',
                'password' => bcrypt('password123'),
                'role' => 'admin',
            ]
        );

        // Tambahkan ini: Buat user biasa untuk tes proteksi (403)
        User::updateOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'User Biasa',
                'password' => bcrypt('password123'),
                'role' => 'user',
            ]
        );


        User::updateOrCreate(
            ['email' => 'editor@gmail.com'],
            [
                'name' => 'Editor News',
                'password' => bcrypt('password123'),
                'role' => 'editor',
            ]
        );

        // Jalankan seeder kategori
        $this->call(CategorySeeder::class);
    }
}