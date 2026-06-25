<?php

namespace Database\Seeders;

use App\Models\Skripsi;
use Illuminate\Database\Seeder;

class SkripsiSeeder extends Seeder
{
    public function run(): void
    {
        $daftarSkripsi = [
            [
                'judul_skripsi' => 'Sistem Informasi Manajemen Perpustakaan Berbasis Web Menggunakan Laravel',
                'nama_penulis'  => 'Andi Firmansyah',
                'npm'           => '065119001',
                'program_studi' => 'Ilmu Komputer',
                'tahun_lulus'   => '2023',
                'nomor_rak'     => 'A',
                'nomor_baris'   => '1',
                'is_cd_artikel' => true,
                'abstrak'       => 'Penelitian ini merancang dan mengimplementasikan sistem informasi manajemen perpustakaan berbasis web menggunakan framework Laravel dengan fitur peminjaman, pengembalian, dan pelaporan otomatis.',
            ],
            [
                'judul_skripsi' => 'Implementasi Algoritma K-Nearest Neighbor untuk Klasifikasi Penyakit Diabetes',
                'nama_penulis'  => 'Siti Rahayu',
                'npm'           => '065119002',
                'program_studi' => 'Ilmu Komputer',
                'tahun_lulus'   => '2023',
                'nomor_rak'     => 'A',
                'nomor_baris'   => '2',
                'is_cd_artikel' => true,
                'abstrak'       => 'Penelitian ini mengimplementasikan algoritma K-Nearest Neighbor untuk mengklasifikasikan pasien diabetes menggunakan dataset Pima Indians dengan akurasi mencapai 78,9%.',
            ],
            [
                'judul_skripsi' => 'Analisis Sentimen Ulasan Produk E-Commerce Menggunakan Naive Bayes',
                'nama_penulis'  => 'Budi Santoso',
                'npm'           => '065119003',
                'program_studi' => 'Ilmu Komputer',
                'tahun_lulus'   => '2023',
                'nomor_rak'     => 'A',
                'nomor_baris'   => '3',
                'is_cd_artikel' => false,
                'abstrak'       => 'Penelitian ini menganalisis sentimen ulasan produk e-commerce Tokopedia menggunakan metode Naive Bayes dengan hasil akurasi 82% pada 2000 data ulasan.',
            ],
            [
                'judul_skripsi' => 'Perancangan Aplikasi Mobile Pemantau Kesehatan Ibu Hamil Berbasis Android',
                'nama_penulis'  => 'Dewi Anggraeni',
                'npm'           => '065120001',
                'program_studi' => 'Ilmu Komputer',
                'tahun_lulus'   => '2024',
                'nomor_rak'     => 'B',
                'nomor_baris'   => '1',
                'is_cd_artikel' => true,
                'abstrak'       => 'Aplikasi Android untuk memantau kesehatan ibu hamil secara realtime, dilengkapi fitur reminder jadwal kontrol dan konsultasi dokter online.',
            ],
            [
                'judul_skripsi' => 'Penerapan Metode TOPSIS untuk Sistem Pendukung Keputusan Seleksi Beasiswa',
                'nama_penulis'  => 'Rizky Pratama',
                'npm'           => '065120002',
                'program_studi' => 'Ilmu Komputer',
                'tahun_lulus'   => '2024',
                'nomor_rak'     => 'B',
                'nomor_baris'   => '2',
                'is_cd_artikel' => true,
                'abstrak'       => 'Sistem pendukung keputusan berbasis TOPSIS untuk menentukan penerima beasiswa berprestasi dengan mempertimbangkan 6 kriteria penilaian akademik dan non-akademik.',
            ],
            [
                'judul_skripsi' => 'Rancang Bangun Sistem Absensi Mahasiswa Menggunakan Face Recognition',
                'nama_penulis'  => 'Fajar Nugraha',
                'npm'           => '065120003',
                'program_studi' => 'Ilmu Komputer',
                'tahun_lulus'   => '2024',
                'nomor_rak'     => 'B',
                'nomor_baris'   => '3',
                'is_cd_artikel' => false,
                'abstrak'       => 'Sistem absensi otomatis menggunakan face recognition berbasis OpenCV dan Python, terintegrasi dengan database MySQL untuk pencatatan kehadiran mahasiswa secara real-time.',
            ],
            [
                'judul_skripsi' => 'Optimasi Jaringan Syaraf Tiruan untuk Prediksi Curah Hujan Kota Bogor',
                'nama_penulis'  => 'Nadia Putri',
                'npm'           => '065120004',
                'program_studi' => 'Ilmu Komputer',
                'tahun_lulus'   => '2024',
                'nomor_rak'     => 'B',
                'nomor_baris'   => '4',
                'is_cd_artikel' => true,
                'abstrak'       => 'Penelitian ini mengoptimasi jaringan syaraf tiruan backpropagation untuk memprediksi curah hujan bulanan Kota Bogor dengan data 10 tahun terakhir dari BMKG.',
            ],
            [
                'judul_skripsi' => 'Implementasi Enkripsi AES-256 pada Sistem Penyimpanan Data Rekam Medis',
                'nama_penulis'  => 'Hendra Wijaya',
                'npm'           => '065121001',
                'program_studi' => 'Ilmu Komputer',
                'tahun_lulus'   => '2025',
                'nomor_rak'     => 'C',
                'nomor_baris'   => '1',
                'is_cd_artikel' => true,
                'abstrak'       => 'Implementasi algoritma enkripsi AES-256 untuk mengamankan penyimpanan data rekam medis pasien pada sistem informasi rumah sakit berbasis cloud.',
            ],
            [
                'judul_skripsi' => 'Sistem Rekomendasi Film Menggunakan Collaborative Filtering Berbasis Machine Learning',
                'nama_penulis'  => 'Lina Kusuma',
                'npm'           => '065121002',
                'program_studi' => 'Ilmu Komputer',
                'tahun_lulus'   => '2025',
                'nomor_rak'     => 'C',
                'nomor_baris'   => '2',
                'is_cd_artikel' => false,
                'abstrak'       => 'Sistem rekomendasi film berbasis collaborative filtering menggunakan algoritma matrix factorization dengan dataset MovieLens, menghasilkan precision@10 sebesar 74%.',
            ],
            [
                'judul_skripsi' => 'Perancangan Infrastruktur Jaringan Komputer Menggunakan Teknologi SDN',
                'nama_penulis'  => 'Dian Permata',
                'npm'           => '065121003',
                'program_studi' => 'Ilmu Komputer',
                'tahun_lulus'   => '2025',
                'nomor_rak'     => 'C',
                'nomor_baris'   => '3',
                'is_cd_artikel' => true,
                'abstrak'       => 'Perancangan dan simulasi infrastruktur jaringan komputer kampus menggunakan teknologi Software Defined Networking dengan controller OpenDaylight.',
            ],
        ];

        foreach ($daftarSkripsi as $skripsi) {
            Skripsi::create($skripsi);
        }
    }
}