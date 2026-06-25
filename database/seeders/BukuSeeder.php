<?php

namespace Database\Seeders;

use App\Models\Buku;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        // Mapping nama penerbit → id (sesuai urutan PenerbitSeeder)
// 1=Bentang Pustaka, 2=Gramedia, 3=Lentera Dipantara, 4=Pastel Books,
// 5=Grasindo, 6=Truedee Books, 7=Media Kita, 8=KPG, 9=Republika, 10=Nourma Books

$daftarBuku = [
            ['kode_buku'=>'978-602-291-099-4','judul_buku'=>'Laskar Pelangi','penulis'=>'Andrea Hirata','tahun_terbit'=>'01/01/2005','stok_buku'=>5,'kategori'=>'Fiksi Sastra','penerbit'=>'Bentang Pustaka','penerbit_id'=>1,'rak'=>'A1','cover_buku'=>null],
            ['kode_buku'=>'978-602-03-0112-9','judul_buku'=>'Bumi','penulis'=>'Tere Liye','tahun_terbit'=>'01/01/2014','stok_buku'=>3,'kategori'=>'Fantasi','penerbit'=>'Gramedia Pustaka Utama','penerbit_id'=>2,'rak'=>'B2','cover_buku'=>null],
            ['kode_buku'=>'978-979-22-4861-6','judul_buku'=>'Negeri 5 Menara','penulis'=>'Ahmad Fuadi','tahun_terbit'=>'01/01/2009','stok_buku'=>7,'kategori'=>'Edukasi','penerbit'=>'Gramedia Pustaka Utama','penerbit_id'=>2,'rak'=>'C1','cover_buku'=>null],
            ['kode_buku'=>'978-979-22-4959-0','judul_buku'=>'Perahu Kertas','penulis'=>'Dee Lestari','tahun_terbit'=>'01/01/2009','stok_buku'=>4,'kategori'=>'Romantis','penerbit'=>'Bentang Pustaka','penerbit_id'=>1,'rak'=>'D3','cover_buku'=>null],
            ['kode_buku'=>'978-979-461-509-6','judul_buku'=>'Ronggeng Dukuh Paruk','penulis'=>'Ahmad Tohari','tahun_terbit'=>'01/01/1982','stok_buku'=>2,'kategori'=>'Sastra Sejarah','penerbit'=>'Gramedia Pustaka Utama','penerbit_id'=>2,'rak'=>'E2','cover_buku'=>null],
            ['kode_buku'=>'978-979-97312-3-4','judul_buku'=>'Bumi Manusia','penulis'=>'Pramoedya Ananta Toer','tahun_terbit'=>'01/01/1980','stok_buku'=>8,'kategori'=>'Sastra Sejarah','penerbit'=>'Lentera Dipantara','penerbit_id'=>3,'rak'=>'E3','cover_buku'=>null],
            ['kode_buku'=>'978-602-220-115-3','judul_buku'=>'Cantik Itu Luka','penulis'=>'Eka Kurniawan','tahun_terbit'=>'01/01/2002','stok_buku'=>6,'kategori'=>'Fiksi Sastra','penerbit'=>'Gramedia Pustaka Utama','penerbit_id'=>2,'rak'=>'A2','cover_buku'=>null],
            ['kode_buku'=>'978-602-03-2478-4','judul_buku'=>'Hujan','penulis'=>'Tere Liye','tahun_terbit'=>'01/01/2016','stok_buku'=>10,'kategori'=>'Sci-Fi','penerbit'=>'Gramedia Pustaka Utama','penerbit_id'=>2,'rak'=>'F1','cover_buku'=>null],
            ['kode_buku'=>'978-602-7870-41-3','judul_buku'=>'Dilan: Dia adalah Dilanku Tahun 1990','penulis'=>'Pidi Baiq','tahun_terbit'=>'01/01/2014','stok_buku'=>12,'kategori'=>'Romantis','penerbit'=>'Pastel Books','penerbit_id'=>4,'rak'=>'D4','cover_buku'=>null],
            ['kode_buku'=>'978-979-759-151-4','judul_buku'=>'5 cm','penulis'=>'Donny Dhirgantoro','tahun_terbit'=>'01/01/2005','stok_buku'=>5,'kategori'=>'Petualangan','penerbit'=>'Grasindo','penerbit_id'=>5,'rak'=>'G2','cover_buku'=>null],
            ['kode_buku'=>'978-979-22-3850-1','judul_buku'=>'Rectoverso','penulis'=>'Dee Lestari','tahun_terbit'=>'01/01/2008','stok_buku'=>3,'kategori'=>'Antologi Cerpen','penerbit'=>'Bentang Pustaka','penerbit_id'=>1,'rak'=>'H1','cover_buku'=>null],
            ['kode_buku'=>'978-979-96257-0-0','judul_buku'=>'Supernova: Ksatria, Puteri, dan Bintang Jatuh','penulis'=>'Dee Lestari','tahun_terbit'=>'01/01/2001','stok_buku'=>4,'kategori'=>'Sci-Fi','penerbit'=>'Truedee Books','penerbit_id'=>6,'rak'=>'F2','cover_buku'=>null],
            ['kode_buku'=>'978-602-74322-9-1','judul_buku'=>'Garis Waktu','penulis'=>'Fiersa Besari','tahun_terbit'=>'01/01/2016','stok_buku'=>9,'kategori'=>'Puisi','penerbit'=>'Media Kita','penerbit_id'=>7,'rak'=>'I3','cover_buku'=>null],
            ['kode_buku'=>'978-602-74322-8-4','judul_buku'=>'11:11','penulis'=>'Fiersa Besari','tahun_terbit'=>'01/01/2018','stok_buku'=>7,'kategori'=>'Fiksi','penerbit'=>'Media Kita','penerbit_id'=>7,'rak'=>'A3','cover_buku'=>null],
            ['kode_buku'=>'978-979-97312-4-1','judul_buku'=>'Anak Semua Bangsa','penulis'=>'Pramoedya Ananta Toer','tahun_terbit'=>'01/01/1980','stok_buku'=>5,'kategori'=>'Sastra Sejarah','penerbit'=>'Lentera Dipantara','penerbit_id'=>3,'rak'=>'E4','cover_buku'=>null],
            ['kode_buku'=>'978-602-422-211-8','judul_buku'=>'Laut Bercerita','penulis'=>'Leila S. Chudori','tahun_terbit'=>'01/01/2017','stok_buku'=>11,'kategori'=>'Sejarah Drama','penerbit'=>'Kepustakaan Populer Gramedia','penerbit_id'=>8,'rak'=>'E1','cover_buku'=>null],
            ['kode_buku'=>'978-602-291-463-3','judul_buku'=>'Aroma Karsa','penulis'=>'Dee Lestari','tahun_terbit'=>'01/01/2018','stok_buku'=>6,'kategori'=>'Fantasi','penerbit'=>'Bentang Pustaka','penerbit_id'=>1,'rak'=>'B3','cover_buku'=>null],
            ['kode_buku'=>'978-602-291-524-1','judul_buku'=>'Orang-Orang Biasa','penulis'=>'Andrea Hirata','tahun_terbit'=>'01/01/2019','stok_buku'=>8,'kategori'=>'Komedi','penerbit'=>'Bentang Pustaka','penerbit_id'=>1,'rak'=>'J2','cover_buku'=>null],
            ['kode_buku'=>'978-602-0822-12-9','judul_buku'=>'Pulang','penulis'=>'Tere Liye','tahun_terbit'=>'01/01/2015','stok_buku'=>15,'kategori'=>'Aksi Drama','penerbit'=>'Republika Penerbit','penerbit_id'=>9,'rak'=>'K1','cover_buku'=>null],
            ['kode_buku'=>'978-602-8997-44-7','judul_buku'=>'Sepatu Dahlan','penulis'=>'Khrisna Pabichara','tahun_terbit'=>'01/01/2012','stok_buku'=>4,'kategori'=>'Biografi','penerbit'=>'Nourma Books','penerbit_id'=>10,'rak'=>'L4','cover_buku'=>null],
        ];

        foreach ($daftarBuku as $buku) {
            $buku['tahun_terbit'] = Carbon::createFromFormat('d/m/Y', $buku['tahun_terbit'])->format('Y-m-d');
            Buku::create($buku);
        }
    }
}