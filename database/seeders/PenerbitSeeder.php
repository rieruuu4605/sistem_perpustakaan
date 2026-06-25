<?php

namespace Database\Seeders;

use App\Models\Penerbit;
use Illuminate\Database\Seeder;

class PenerbitSeeder extends Seeder
{
    public function run(): void
    {
        $daftarPenerbit = [
            [
                'nama_penerbit' => 'Bentang Pustaka',
                'alamat'        => 'Jl. Pandega Padma No.19, Yogyakarta',
                'email'         => 'info@bentangpustaka.com',
                'telepon'       => '02742877701',
                'website'       => 'https://www.bentangpustaka.com',
            ],
            [
                'nama_penerbit' => 'Gramedia Pustaka Utama',
                'alamat'        => 'Jl. Palmerah Barat No.29-37, Jakarta',
                'email'         => 'info@gramediapustaka.com',
                'telepon'       => '02153650110',
                'website'       => 'https://www.gramedia.com',
            ],
            [
                'nama_penerbit' => 'Lentera Dipantara',
                'alamat'        => 'Jl. H. Montong No.57, Jakarta Selatan',
                'email'         => 'lentera_dipantara@yahoo.com',
                'telepon'       => '02178880556',
                'website'       => null,
            ],
            [
                'nama_penerbit' => 'Pastel Books',
                'alamat'        => 'Jl. Soekamo Hatta No.77, Bandung',
                'email'         => 'pastelbooks@mizan.com',
                'telepon'       => '02275915440',
                'website'       => 'https://www.mizan.com',
            ],
            [
                'nama_penerbit' => 'Grasindo',
                'alamat'        => 'Jl. Palmerah Selatan No.22-28, Jakarta',
                'email'         => 'grasindo@grasindo.id',
                'telepon'       => '02153650110',
                'website'       => 'https://www.grasindo.id',
            ],
            [
                'nama_penerbit' => 'Truedee Books',
                'alamat'        => 'Jakarta Selatan',
                'email'         => 'info@truedee.com',
                'telepon'       => null,
                'website'       => null,
            ],
            [
                'nama_penerbit' => 'Media Kita',
                'alamat'        => 'Jl. H. Saabah No.6, Jakarta Selatan',
                'email'         => 'mediakita@mediakita.com',
                'telepon'       => '02178830801',
                'website'       => null,
            ],
            [
                'nama_penerbit' => 'Kepustakaan Populer Gramedia',
                'alamat'        => 'Jl. Palmerah Barat No.29-37, Jakarta',
                'email'         => 'kpg@gramedia.com',
                'telepon'       => '02153650110',
                'website'       => 'https://www.kpg.or.id',
            ],
            [
                'nama_penerbit' => 'Republika Penerbit',
                'alamat'        => 'Jl. Warung Buncit Raya No.37, Jakarta',
                'email'         => 'info@republika.co.id',
                'telepon'       => '02178000100',
                'website'       => 'https://www.republika.co.id',
            ],
            [
                'nama_penerbit' => 'Nourma Books',
                'alamat'        => 'Makassar, Sulawesi Selatan',
                'email'         => null,
                'telepon'       => null,
                'website'       => null,
            ],
        ];

        foreach ($daftarPenerbit as $penerbit) {
            Penerbit::create($penerbit);
        }
    }
}