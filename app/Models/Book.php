<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // Import ini untuk relasi many-to-many

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'isbn',
        'title',
        'author_id',
        'publisher',
        'year',
        'cover',
        'status',
        // Tambahan dari Tugas 2:
        'description', // ⬅️ Tambah kolom deskripsi
    ];

    protected $casts = [
        'year' => 'integer',
        'is_borrowed' => 'boolean', // ⬅️ Tambah cast jika Anda menggunakan kolom ini untuk dashboard
    ];

    /**
     * Relasi One-to-Many terbalik dengan Author.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Relasi Many-to-Many dengan Category.
     * Menggunakan tabel pivot 'book_category'.
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class); // ⬅️ Tambah relasi categories
    }
}