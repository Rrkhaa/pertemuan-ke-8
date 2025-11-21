<?php

namespace Database\Factories; // Pastikan namespace ini benar

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory; // ⬅️ BARIS INI HILANG

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            // Relasi ke Author
            'author_id' => Author::factory(),
            
            // Field Buku
            'isbn' => $this->faker->unique()->isbn13(),
            'title' => $this->faker->sentence(4),
            'publisher' => $this->faker->company(),
            'year' => $this->faker->year(),
            'cover' => 'placeholder.jpg', // Contoh
            'status' => 'available', // Contoh

            // Tambahan dari Tugas 2:
            'description' => $this->faker->paragraph(2), // ⬅️ Field Description
            'is_borrowed' => $this->faker->boolean(30), // ⬅️ Status Pinjaman (30% dipinjam)
        ];
    }
}