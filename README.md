# 🎌 AniNews — Portal Berita Anime & Manga

![Laravel](https://img.shields.io/badge/Laravel-12.x-red?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.4-blue?style=flat-square&logo=php)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-38bdf8?style=flat-square&logo=tailwindcss)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

Proyek sistem manajemen portal berita sederhana berbasis **Laravel 12** dengan tema dark anime. Dibangun sebagai bagian dari tugas pembelajaran RPL di **SMK Negeri 11 Bandung**.

---

## ✨ Fitur

### 🌐 Halaman Publik (Pengunjung)
- Halaman utama dengan tampilan hero berita utama
- Grid berita terbaru dengan thumbnail
- Halaman detail berita lengkap dengan berita terkait
- Search bar pencarian berita
- Filter berdasarkan kategori

### 🔐 Sistem Autentikasi
- Login & Register (Laravel Breeze)
- Sistem role: **Admin**, **Editor**, **User**
- Middleware proteksi akses per role

### 📰 Manajemen Berita (Admin & Editor)
- CRUD Berita (Tambah, Lihat, Edit, Hapus)
- Upload thumbnail gambar
- Relasi Kategori & Tag
- Status artikel: **Draft** / **Published**
- Hapus berita hanya bisa dilakukan **Admin**

### 👥 Manajemen User (Admin Only)
- Lihat daftar semua user
- Ubah role user (Admin / Editor / User)
- Proteksi: Admin tidak bisa ubah role dirinya sendiri

---

## 🛠️ Teknologi

| Teknologi | Versi |
|-----------|-------|
| PHP | 8.4 |
| Laravel | 12.x |
| Laravel Breeze | - |
| MySQL | - |
| Tailwind CSS | 3.x |
| Alpine.js | - |
| Vite | - |

---

## ⚙️ Cara Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/Dsa08/berita-laravel.git
cd berita-laravel
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Konfigurasi Environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=beritadb
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrasi & Seeder
```bash
php artisan migrate --seed
```

### 5. Storage Link
```bash
php artisan storage:link
```

### 6. Jalankan Aplikasi

Buka **2 terminal** secara bersamaan:

**Terminal 1:**
```bash
php artisan serve
```

**Terminal 2:**
```bash
npm run dev
```

Lalu buka browser di: **http://localhost:8000**

---

## 👤 Role & Akses

| Role | Baca Berita | Tulis/Edit Berita | Hapus Berita | Kelola User |
|------|:-----------:|:-----------------:|:------------:|:-----------:|
| User | ✅ | ❌ | ❌ | ❌ |
| Editor | ✅ | ✅ | ❌ | ❌ |
| Admin | ✅ | ✅ | ✅ | ✅ |

> Role default untuk akun baru adalah **User**. Ubah role melalui halaman `/admin/users` (hanya Admin).

---

## 📁 Struktur Folder Penting

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── NewsController.php      # Halaman publik
│   │   │   ├── PostController.php      # CRUD berita
│   │   │   └── UserController.php      # Manajemen user
│   │   └── Middleware/
│   │       └── RoleMiddleware.php      # Cek role user
│   └── Models/
│       ├── Post.php
│       ├── Category.php
│       ├── Tag.php
│       └── User.php
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── CategorySeeder.php
│       └── TagSeeder.php
└── resources/views/
    ├── public/                         # Halaman publik
    │   ├── home.blade.php
    │   └── show.blade.php
    ├── posts/                          # CRUD berita
    ├── admin/users/                    # Manajemen user
    ├── layouts/                        # Layout utama
    └── auth/                           # Halaman login/register
```

---

## 🗺️ Routes Utama

| Method | URL | Keterangan |
|--------|-----|------------|
| GET | `/` | Halaman publik utama |
| GET | `/berita/{post}` | Detail berita |
| GET | `/admin/posts` | Daftar berita (Admin & Editor) |
| GET | `/admin/users` | Manajemen user (Admin only) |
| GET | `/dashboard` | Dashboard |
| GET | `/login` | Halaman login |
| GET | `/register` | Halaman register |

---

## 📝 Catatan Pengembangan

Proyek ini dikembangkan mengikuti tutorial dari [Gurututorku.com](https://gurututorku.com) dengan tambahan fitur dan penyesuaian:

- Bagian 1: CRUD Post
- Bagian 2: Upload Gambar Thumbnail
- Bagian 3: Relasi Kategori dan Tag
- Bagian 4: Login Breeze, Role & Middleware

---

## 👨‍💻 Developer

**Dhafin Syawal Anugera**  
SMK Negeri 11 Bandung — Jurusan RPL

---

## 📄 Lisensi

Project ini menggunakan lisensi [MIT](https://opensource.org/licenses/MIT).
