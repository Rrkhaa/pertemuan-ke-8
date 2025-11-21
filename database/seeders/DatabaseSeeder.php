<?php

namespace Database\Seeders; // ⬅️ Pastikan namespace ini ada

use App\Models\Category;
use App\Models\Book;
use Illuminate\Database\Seeder; // ⬅️ BARIS INI HILANG
// ...

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Jalankan Seeder Roles (Admin, Staff, Viewer)
        $this->call(RoleUserSeeder::class); 

        // 2. Buat Kategori Dummy (misalnya 10 kategori)
        Category::factory(10)->create(); 

        // 3. Buat Buku Dummy (misalnya 50 buku)
        Book::factory(50)
            ->create()
            ->each(function (Book $book) {
                // 4. Sinkronkan Relasi Many-to-Many
                $categories = Category::inRandomOrder()->take(rand(1, 3))->pluck('id');
                $book->categories()->sync($categories);
            });
    }
}