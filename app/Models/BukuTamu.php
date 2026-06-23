<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    // Pastikan nama tabel sesuai dengan yang ada di database
    protected $table = 'buku_tamu'; 

    protected $fillable = [
        'nama', 
        'npm', 
        'tujuan', 
        'foto_wajah'
    ];
}