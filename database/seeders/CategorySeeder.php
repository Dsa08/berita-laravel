<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Teknologi',
            'Hiburan',
            'Politik',
            'Olahraga',
            'Pendidikan',
        ];

        foreach ($categories as $category) {
            DB::table('categories')->updateOrInsert(
                ['name' => $category], // cek berdasarkan nama
                [
                    'name' => $category,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}