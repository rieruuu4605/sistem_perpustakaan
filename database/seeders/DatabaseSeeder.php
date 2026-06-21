<?php

namespace Database\Seeders;

use App\Models\KepalaPerpus;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Data Kepala Perpus (dari seeder sebelumnya)
        $userKepala = User::create([
            "username"   =>   "Yosep Sudirman",
            "no_telepon" =>   "08219012441",
            "email"      =>   "admin@gmail.com",
            "password"   =>   Hash::make("123456"),
            "role"       =>   "kepala_perpus",
        ]);

        KepalaPerpus::create([
            "user_id"       =>     $userKepala->id,
            "nama_lengkap"   =>    "Mochammad Yosep Sudirman",
            "nomer_induk"   =>     "121099121",
            "jenis_kelamin"   =>   "Laki-Laki",
            "tanggal_lahir" => "2007-11-27",
            "alamat"          =>    "Jalan Janti Nomer 21"
        ]);

        // Tambahan: Seeder User Petugas
        $userPetugas = User::create([
            "username"   =>   "Tanti",
            "no_telepon" =>   "081234567890",
            "email"      =>   "petugas@gmail.com",
            "password"   =>   Hash::make("123456"),
            "role"       =>   "petugas",
        ]);

        \App\Models\Petugas::create([
            "user_id"       =>     $userPetugas->id,
            "nama_lengkap"   =>    "Tanti Dwi",
            "nomer_induk"   =>     "987654321",
            "jenis_kelamin"   =>   "Perempuan",
            "tanggal_lahir" => "2002-05-15",
            "alamat"          =>    "Jalan Perpus No. 10"
        ]);

        // Tambahkan User Anggota
        $userAnggota = User::create([
            "username"   =>   "Fadli Ansah",
            "no_telepon" =>   "081122334455",
            "email"      =>   "anggota@gmail.com",
            "password"   =>   Hash::make("123456"),
            "role"       =>   "anggota",
        ]);

        // Tambahkan Profil Anggota
        \App\Models\Anggota::create([
            "user_id"       =>     $userAnggota->id,
            "nama_lengkap"   =>    "Fadli Ansah",
            "nomer_induk"   =>     "12345678",
            "jenis_kelamin"   =>   "Laki-Laki",
            "tanggal_lahir" => "2008-01-20",
            "alamat"          =>    "Jalan Merdeka No 5"
        ]);

    
       $daftarBuku = [
            [
                'kode_buku' => '978-602-291-099-4',
                'judul_buku' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'tahun_terbit' => '01/01/2005',
                'stok_buku' => 5,
                'kategori' => 'Fiksi Sastra',
                'penerbit' => 'Bentang Pustaka',
                'cover_buku' => null, 
            ],
            [
                'kode_buku' => '978-602-03-0112-9',
                'judul_buku' => 'Bumi',
                'penulis' => 'Tere Liye',
                'tahun_terbit' => '01/01/2014',
                'stok_buku' => 3,
                'kategori' => 'Fantasi',
                'penerbit' => 'Gramedia Pustaka Utama',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-979-22-4861-6',
                'judul_buku' => 'Negeri 5 Menara',
                'penulis' => 'Ahmad Fuadi',
                'tahun_terbit' => '01/01/2009',
                'stok_buku' => 7,
                'kategori' => 'Edukasi',
                'penerbit' => 'Gramedia Pustaka Utama',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-979-22-4959-0',
                'judul_buku' => 'Perahu Kertas',
                'penulis' => 'Dee Lestari',
                'tahun_terbit' => '01/01/2009',
                'stok_buku' => 4,
                'kategori' => 'Romantis',
                'penerbit' => 'Bentang Pustaka',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-979-461-509-6',
                'judul_buku' => 'Ronggeng Dukuh Paruk',
                'penulis' => 'Ahmad Tohari',
                'tahun_terbit' => '01/01/1982',
                'stok_buku' => 2,
                'kategori' => 'Sastra Sejarah',
                'penerbit' => 'Gramedia Pustaka Utama',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-979-97312-3-4',
                'judul_buku' => 'Bumi Manusia',
                'penulis' => 'Pramoedya Ananta Toer',
                'tahun_terbit' => '01/01/1980',
                'stok_buku' => 8,
                'kategori' => 'Sastra Sejarah',
                'penerbit' => 'Lentera Dipantara',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-602-220-115-3',
                'judul_buku' => 'Cantik Itu Luka',
                'penulis' => 'Eka Kurniawan',
                'tahun_terbit' => '01/01/2002',
                'stok_buku' => 6,
                'kategori' => 'Fiksi Sastra',
                'penerbit' => 'Gramedia Pustaka Utama',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-602-03-2478-4',
                'judul_buku' => 'Hujan',
                'penulis' => 'Tere Liye',
                'tahun_terbit' => '01/01/2016',
                'stok_buku' => 10,
                'kategori' => 'Sci-Fi',
                'penerbit' => 'Gramedia Pustaka Utama',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-602-7870-41-3',
                'judul_buku' => 'Dilan: Dia adalah Dilanku Tahun 1990',
                'penulis' => 'Pidi Baiq',
                'tahun_terbit' => '01/01/2014',
                'stok_buku' => 12,
                'kategori' => 'Romantis',
                'penerbit' => 'Pastel Books',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-979-759-151-4',
                'judul_buku' => '5 cm',
                'penulis' => 'Donny Dhirgantoro',
                'tahun_terbit' => '01/01/2005',
                'stok_buku' => 5,
                'kategori' => 'Petualangan',
                'penerbit' => 'Grasindo',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-979-22-3850-1',
                'judul_buku' => 'Rectoverso',
                'penulis' => 'Dee Lestari',
                'tahun_terbit' => '01/01/2008',
                'stok_buku' => 3,
                'kategori' => 'Antologi Cerpen',
                'penerbit' => 'Bentang Pustaka',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-979-96257-0-0',
                'judul_buku' => 'Supernova: Ksatria, Puteri, dan Bintang Jatuh',
                'penulis' => 'Dee Lestari',
                'tahun_terbit' => '01/01/2001',
                'stok_buku' => 4,
                'kategori' => 'Sci-Fi',
                'penerbit' => 'Truedee Books',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-602-74322-9-1',
                'judul_buku' => 'Garis Waktu',
                'penulis' => 'Fiersa Besari',
                'tahun_terbit' => '01/01/2016',
                'stok_buku' => 9,
                'kategori' => 'Puisi',
                'penerbit' => 'Media Kita',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-602-74322-8-4',
                'judul_buku' => '11:11',
                'penulis' => 'Fiersa Besari',
                'tahun_terbit' => '01/01/2018',
                'stok_buku' => 7,
                'kategori' => 'Fiksi',
                'penerbit' => 'Media Kita',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-979-97312-4-1',
                'judul_buku' => 'Anak Semua Bangsa',
                'penulis' => 'Pramoedya Ananta Toer',
                'tahun_terbit' => '01/01/1980',
                'stok_buku' => 5,
                'kategori' => 'Sastra Sejarah',
                'penerbit' => 'Lentera Dipantara',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-602-422-211-8',
                'judul_buku' => 'Laut Bercerita',
                'penulis' => 'Leila S. Chudori',
                'tahun_terbit' => '01/01/2017',
                'stok_buku' => 11,
                'kategori' => 'Sejarah Drama',
                'penerbit' => 'Kepustakaan Populer Gramedia',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-602-291-463-3',
                'judul_buku' => 'Aroma Karsa',
                'penulis' => 'Dee Lestari',
                'tahun_terbit' => '01/01/2018',
                'stok_buku' => 6,
                'kategori' => 'Fantasi',
                'penerbit' => 'Bentang Pustaka',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-602-291-524-1',
                'judul_buku' => 'Orang-Orang Biasa',
                'penulis' => 'Andrea Hirata',
                'tahun_terbit' => '01/01/2019',
                'stok_buku' => 8,
                'kategori' => 'Komedi',
                'penerbit' => 'Bentang Pustaka',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-602-0822-12-9',
                'judul_buku' => 'Pulang',
                'penulis' => 'Tere Liye',
                'tahun_terbit' => '01/01/2015',
                'stok_buku' => 15,
                'kategori' => 'Aksi Drama',
                'penerbit' => 'Republika Penerbit',
                'cover_buku' => null,
            ],
            [
                'kode_buku' => '978-602-8997-44-7',
                'judul_buku' => 'Sepatu Dahlan',
                'penulis' => 'Khrisna Pabichara',
                'tahun_terbit' => '01/01/2012',
                'stok_buku' => 4,
                'kategori' => 'Biografi',
                'penerbit' => 'Nourma Books',
                'cover_buku' => null,
            ],
        ];

        foreach ($daftarBuku as $buku) {
            // Mengonversi format dd/mm/yyyy menjadi format database YYYY-MM-DD
            $buku['tahun_terbit'] = \Carbon\Carbon::createFromFormat('d/m/Y', $buku['tahun_terbit'])->format('Y-m-d');
            
            \App\Models\Buku::create($buku);
        }
    
    }
}
