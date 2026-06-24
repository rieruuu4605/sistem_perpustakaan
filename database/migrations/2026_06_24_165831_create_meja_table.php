<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meja', function (Blueprint $table) {
            $table->id();
            $table->string('kode_meja'); // M1, M2, dst
            $table->integer('nomor_bangku'); // 1-4
            $table->enum('status', ['kosong', 'terisi'])->default('kosong');
            $table->timestamp('terakhir_diperbarui')->nullable();
            $table->foreignId('petugas_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });
    }
};
