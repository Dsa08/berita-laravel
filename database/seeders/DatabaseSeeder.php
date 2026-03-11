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
        // Buat user default
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // Cari berdasarkan email
            [
                'name' => 'Admin News',
                'password' => bcrypt('password123'),
                'role' => 'admin',
            ]
        );

        // Jalankan seeder kategori
        $this->call(CategorySeeder::class);
    }
}