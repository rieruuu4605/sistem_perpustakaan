<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('buku', function (Blueprint $table) {
            $table->foreignId('penerbit_id')->nullable()->after('id')->constrained('penerbits')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('buku', function (Blueprint $table) {
            $table->dropForeign(['penerbit_id']);
            $table->dropColumn('penerbit_id');
        });
    }
};
