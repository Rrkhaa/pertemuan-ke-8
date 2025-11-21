<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleUserSeeder extends Seeder
{
    public function run(): void
    {
        // Data pengguna yang ingin dimasukkan
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Staff User',
                'email' => 'staff@example.com',
                'password' => Hash::make('password'),
                'role' => 'staff',
            ],
            [
                'name' => 'Viewer User',
                'email' => 'viewer@example.com',
                'password' => Hash::make('password'),
                'role' => 'viewer',
            ],
        ];

        foreach ($users as $userData) {
            // Gunakan firstOrCreate untuk mencegah duplikasi berdasarkan email
            User::firstOrCreate(
                // Kriteria unik untuk dicari: email
                ['email' => $userData['email']], 
                // Data yang akan digunakan jika record harus dibuat
                $userData
            );
        }
    }
}