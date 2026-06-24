<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_ebook',
        'penulis',
        'tahun_terbit',
        'kategori',
        'ukuran_file',
        'file_pdf',
        'sinopsis',
        'total_download'
    ];

}
