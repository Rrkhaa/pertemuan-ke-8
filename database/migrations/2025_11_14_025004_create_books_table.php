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
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        // PASTIKAN KOLOM INI ADA:
        $table->string('isbn')->unique();
        $table->string('publisher');
        $table->year('year');
        $table->string('cover')->nullable();
        $table->string('status')->default('available');
        // Kolom lain (author_id, description, is_borrowed) ditambahkan oleh migration berikutnya.
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
