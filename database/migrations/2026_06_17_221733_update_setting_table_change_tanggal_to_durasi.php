<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('setting', function (Blueprint $table) {
            // Hapus kolom lama jika masih ada
            if (Schema::hasColumn('setting', 'tanggal_jatuh_tempo')) {
                $table->dropColumn('tanggal_jatuh_tempo');
            }

            // Tambah kolom baru jika belum ada
            if (!Schema::hasColumn('setting', 'durasi_pinjam')) {
                $table->integer('durasi_pinjam')->default(7)->after('denda_per_hari');
            }
        });
    }

    public function down(): void
    {
        Schema::table('setting', function (Blueprint $table) {
            if (Schema::hasColumn('setting', 'durasi_pinjam')) {
                $table->dropColumn('durasi_pinjam');
            }
        });
    }
};