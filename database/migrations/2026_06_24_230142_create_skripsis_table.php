<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('skripsis', function (Blueprint $table) {
        $table->id();
        $table->string('judul_skripsi');
        $table->string('nama_penulis');
        $table->string('npm');
        $table->string('program_studi');
        $table->string('tahun_lulus')->nullable();
        $table->string('nomor_rak')->nullable();
        $table->string('nomor_baris')->nullable();
        $table->boolean('is_cd_artikel')->default(false);
        $table->text('abstrak');
        $table->timestamps();
    });
}
};
