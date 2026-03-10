<?php

namespace Database\Seeders;

use App\Models\Tag; // Pastikan model Tag sudah ada
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = ['Laravel', 'PHP', 'Tutorial', 'Berita Utama', 'Tips & Trik'];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag,
                'slug' => Str::slug($tag),
            ]);
        }
    }
}