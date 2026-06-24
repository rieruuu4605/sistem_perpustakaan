<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ebooks', function (Blueprint $table) {
            $table->id();
            $table->string('judul_ebook');
            $table->string('penulis');
            $table->integer('tahun_terbit')->nullable();
            $table->string('kategori');
            $table->string('ukuran_file');
            $table->string('file_pdf');
            $table->text('sinopsis')->nullable();
            $table->integer('total_download')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ebooks');
    }
};
