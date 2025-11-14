<?php

namespace App\Policies;

use App\Models\Author;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class AuthorPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // Semua user bisa lihat list
    }

    public function view(User $user, Author $author): bool
    {
        return true; // Semua user bisa lihat detail
    }

    public function create(User $user): bool
    {
        return true; // Semua user bisa buat author baru
    }

    public function update(User $user, Author $author): bool
    {
        return true; // Semua user bisa edit
    }

    public function delete(User $user, Author $author): bool
    {
        return true; // Semua user bisa hapus
    }

    public function restore(User $user, Author $author): bool
    {
        return true;
    }

    public function forceDelete(User $user, Author $author): bool
    {
        return true;
    }
}