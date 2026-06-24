<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MejaSeeder extends Seeder
{
    public function run(): void
    {
        for ($meja = 1; $meja <= 6; $meja++) {
            for ($bangku = 1; $bangku <= 4; $bangku++) {
                DB::table('meja')->insert([
                    'kode_meja'           => 'M' . $meja,
                    'nomor_bangku'        => $bangku,
                    'status'              => 'kosong',
                    'terakhir_diperbarui' => null,
                    'petugas_id'          => null,
                    'created_at'          => now(),
                    'updated_at'          => now(),
                ]);
            }
        }
    }
}