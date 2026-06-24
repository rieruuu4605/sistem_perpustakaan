<?php

namespace Database\Seeders;

use App\Models\Ebook;
use Illuminate\Database\Seeder;

class EbookSeeder extends Seeder
{
    public function run(): void
    {
        $daftarEbook = [
            [
                'judul_ebook'    => 'Pemrograman Web dengan Laravel',
                'penulis'        => 'Ridwan Kamil Saputra',
                'tahun_terbit'   => 2022,
                'kategori'       => 'Teknologi',
                'ukuran_file'    => '4.2 MB',
                'file_pdf'       => 'dummy_laravel.pdf',
                'sinopsis'       => 'Panduan lengkap membangun aplikasi web modern menggunakan framework Laravel dari dasar hingga deployment.',
                'total_download' => 120,
            ],
            [
                'judul_ebook'    => 'Dasar-Dasar Kecerdasan Buatan',
                'penulis'        => 'Andi Prasetyo',
                'tahun_terbit'   => 2021,
                'kategori'       => 'Teknologi',
                'ukuran_file'    => '6.8 MB',
                'file_pdf'       => 'dummy_ai_dasar.pdf',
                'sinopsis'       => 'Pengantar konsep kecerdasan buatan, machine learning, dan deep learning untuk pemula.',
                'total_download' => 95,
            ],
            [
                'judul_ebook'    => 'Fisika Kuantum untuk Pemula',
                'penulis'        => 'Dr. Budi Santoso',
                'tahun_terbit'   => 2020,
                'kategori'       => 'Sains',
                'ukuran_file'    => '5.1 MB',
                'file_pdf'       => 'dummy_fisika_kuantum.pdf',
                'sinopsis'       => 'Menjelaskan konsep-konsep fisika kuantum secara sederhana tanpa perlu latar belakang fisika tingkat lanjut.',
                'total_download' => 73,
            ],
            [
                'judul_ebook'    => 'Biologi Sel dan Molekuler',
                'penulis'        => 'Prof. Sari Dewi',
                'tahun_terbit'   => 2019,
                'kategori'       => 'Sains',
                'ukuran_file'    => '8.3 MB',
                'file_pdf'       => 'dummy_biologi_sel.pdf',
                'sinopsis'       => 'Materi lengkap biologi sel dan molekuler untuk mahasiswa S1 bidang sains dan kesehatan.',
                'total_download' => 58,
            ],
            [
                'judul_ebook'    => 'Filsafat Ilmu Pengetahuan',
                'penulis'        => 'Dr. Hendra Wijaya',
                'tahun_terbit'   => 2018,
                'kategori'       => 'Humaniora',
                'ukuran_file'    => '3.5 MB',
                'file_pdf'       => 'dummy_filsafat.pdf',
                'sinopsis'       => 'Mengkaji dasar-dasar epistemologi, ontologi, dan aksiologi dalam ilmu pengetahuan modern.',
                'total_download' => 44,
            ],
            [
                'judul_ebook'    => 'Sejarah Peradaban Islam',
                'penulis'        => 'Ustadz Ahmad Fauzi',
                'tahun_terbit'   => 2020,
                'kategori'       => 'Humaniora',
                'ukuran_file'    => '7.2 MB',
                'file_pdf'       => 'dummy_sejarah_islam.pdf',
                'sinopsis'       => 'Perjalanan panjang peradaban Islam dari masa Rasulullah hingga era kontemporer.',
                'total_download' => 87,
            ],
            [
                'judul_ebook'    => 'Basis Data dan SQL',
                'penulis'        => 'Ir. Teguh Prasetya',
                'tahun_terbit'   => 2023,
                'kategori'       => 'Teknologi',
                'ukuran_file'    => '3.9 MB',
                'file_pdf'       => 'dummy_basis_data.pdf',
                'sinopsis'       => 'Panduan praktis perancangan basis data relasional dan penguasaan bahasa SQL dari dasar hingga tingkat lanjut.',
                'total_download' => 210,
            ],
            [
                'judul_ebook'    => 'Kimia Organik Dasar',
                'penulis'        => 'Dr. Lina Kusuma',
                'tahun_terbit'   => 2017,
                'kategori'       => 'Sains',
                'ukuran_file'    => '9.1 MB',
                'file_pdf'       => 'dummy_kimia_organik.pdf',
                'sinopsis'       => 'Membahas senyawa karbon, reaksi organik, dan aplikasinya dalam kehidupan sehari-hari dan industri.',
                'total_download' => 61,
            ],
            [
                'judul_ebook'    => 'Psikologi Perkembangan Anak',
                'penulis'        => 'Dr. Rini Anggraeni',
                'tahun_terbit'   => 2021,
                'kategori'       => 'Humaniora',
                'ukuran_file'    => '4.7 MB',
                'file_pdf'       => 'dummy_psikologi_anak.pdf',
                'sinopsis'       => 'Memahami tahapan perkembangan kognitif, emosional, dan sosial anak dari usia dini hingga remaja.',
                'total_download' => 134,
            ],
            [
                'judul_ebook'    => 'Jaringan Komputer dan Keamanan',
                'penulis'        => 'Fajar Nugraha, S.Kom',
                'tahun_terbit'   => 2022,
                'kategori'       => 'Teknologi',
                'ukuran_file'    => '5.6 MB',
                'file_pdf'       => 'dummy_jaringan_komputer.pdf',
                'sinopsis'       => 'Konsep dasar jaringan komputer, protokol TCP/IP, dan teknik-teknik keamanan jaringan modern.',
                'total_download' => 178,
            ],
            [
                'judul_ebook'    => 'Matematika Diskrit',
                'penulis'        => 'Prof. Wahyu Hidayat',
                'tahun_terbit'   => 2019,
                'kategori'       => 'Sains',
                'ukuran_file'    => '6.4 MB',
                'file_pdf'       => 'dummy_matematika_diskrit.pdf',
                'sinopsis'       => 'Materi matematika diskrit untuk mahasiswa ilmu komputer: logika, himpunan, graf, dan kombinatorika.',
                'total_download' => 92,
            ],
            [
                'judul_ebook'    => 'Sosiologi Modern',
                'penulis'        => 'Dr. Maya Sari',
                'tahun_terbit'   => 2020,
                'kategori'       => 'Humaniora',
                'ukuran_file'    => '3.1 MB',
                'file_pdf'       => 'dummy_sosiologi.pdf',
                'sinopsis'       => 'Teori-teori sosiologi kontemporer dan penerapannya dalam memahami fenomena sosial masyarakat Indonesia.',
                'total_download' => 49,
            ],
            [
                'judul_ebook'    => 'Algoritma dan Struktur Data',
                'penulis'        => 'Dian Permata, M.Cs',
                'tahun_terbit'   => 2023,
                'kategori'       => 'Teknologi',
                'ukuran_file'    => '7.8 MB',
                'file_pdf'       => 'dummy_algoritma.pdf',
                'sinopsis'       => 'Pembahasan mendalam algoritma sorting, searching, dan struktur data seperti tree, graph, dan hash table.',
                'total_download' => 305,
            ],
            [
                'judul_ebook'    => 'Ekologi dan Lingkungan Hidup',
                'penulis'        => 'Dr. Bambang Setiawan',
                'tahun_terbit'   => 2018,
                'kategori'       => 'Sains',
                'ukuran_file'    => '5.0 MB',
                'file_pdf'       => 'dummy_ekologi.pdf',
                'sinopsis'       => 'Kajian ekosistem, keanekaragaman hayati, dan isu-isu lingkungan hidup di era perubahan iklim global.',
                'total_download' => 66,
            ],
            [
                'judul_ebook'    => 'Manajemen Sumber Daya Manusia',
                'penulis'        => 'Dr. Dewi Kurniasih',
                'tahun_terbit'   => 2021,
                'kategori'       => 'Humaniora',
                'ukuran_file'    => '4.4 MB',
                'file_pdf'       => 'dummy_msdm.pdf',
                'sinopsis'       => 'Strategi pengelolaan SDM modern meliputi rekrutmen, pengembangan, kompensasi, dan manajemen kinerja.',
                'total_download' => 112,
            ],
        ];

        foreach ($daftarEbook as $ebook) {
            Ebook::create($ebook);
        }
    }
}