<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // ...
public function up()
{
    Schema::table('books', function (Blueprint $table) {
        // Tambahkan foreign key untuk menghubungkan ke tabel 'authors'
        $table->foreignId('author_id')->constrained()->onDelete('cascade')->nullable();
    });
}

public function down()
{
    Schema::table('books', function (Blueprint $table) {
        // Drop foreign key sebelum menghapus kolom
        $table->dropConstrainedForeignId('author_id');
        // Atau $table->dropForeign(['author_id']);
        // $table->dropColumn('author_id');
    });
}
// ...
    
};
