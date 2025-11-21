<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        // Tentukan daftar peran yang diizinkan dan atur nilai default
        $table->enum('role', ['admin', 'staff', 'viewer'])->default('viewer');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        // Logika untuk menghapus kolom jika rollback dilakukan
        $table->dropColumn('role');
    });
}
};
