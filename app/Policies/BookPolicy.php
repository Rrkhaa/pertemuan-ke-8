<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Book;

class BookPolicy
{
    /**
     * Pengecekan awal: Admin selalu diizinkan.
     */
    public function before(User $user, string $ability): bool|null
    {
        if ($user->role === 'admin') {
            return true;
        }

        return null; // Lanjutkan ke pengecekan metode di bawah
    }

    /**
     * Admin, Staff, dan Viewer (Semua) bisa melihat daftar buku.
     */
    public function viewAny(User $user): bool
    {
        return $user->role === 'admin' || $user->role === 'staff' || $user->role === 'viewer';
    }

    /**
     * Admin, Staff, dan Viewer (Semua) bisa melihat detail buku.
     */
    public function view(User $user, Book $book): bool
    {
        return $user->role === 'admin' || $user->role === 'staff' || $user->role === 'viewer';
    }

    /**
     * Admin dan Staff bisa membuat buku baru.
     * Viewer TIDAK BISA.
     */
    public function create(User $user): bool
    {
        return $user->role === 'admin' || $user->role === 'staff';
    }

    /**
     * Admin dan Staff bisa mengedit/mengupdate buku.
     * Viewer TIDAK BISA.
     */
    public function update(User $user, Book $book): bool
    {
        return $user->role === 'admin' || $user->role === 'staff';
    }

    /**
     * Hanya Admin yang bisa menghapus buku.
     * Staff dan Viewer TIDAK BISA.
     */
    public function delete(User $user, Book $book): bool
    {
        return $user->role === 'admin';
    }

    // Metode restore dan forceDelete, hanya Admin yang punya hak
    public function restore(User $user, Book $book): bool
    {
        return $user->role === 'admin';
    }

    public function forceDelete(User $user, Book $book): bool
    {
        return $user->role === 'admin';
    }
}