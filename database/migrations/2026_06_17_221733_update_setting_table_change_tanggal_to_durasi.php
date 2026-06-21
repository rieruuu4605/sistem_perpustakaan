<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
    Schema::table('setting', function (Blueprint $table) {
        $table->renameColumn('tanggal_jatuh_tempo', 'durasi_pinjam');
        // Jika sebelumnya tipe datanya 'date', kamu mungkin perlu mengubahnya jadi 'integer'
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('durasi', function (Blueprint $table) {
            //
        });
    }
};
