<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('book_category', function (Blueprint $table) {
            // Foreign key untuk Book
            $table->foreignId('book_id')->constrained()->onDelete('cascade'); 
            // Foreign key untuk Category
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            
            // Membuat primary key gabungan untuk mencegah duplikasi
            $table->primary(['book_id', 'category_id']); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_category');
    }
};
