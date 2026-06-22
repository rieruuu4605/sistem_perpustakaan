<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengunjungController extends Controller
{
    public function index()
    {
        return view('pengunjung.buku_tamu');
    }

    public function showForm()
    {
        return view('pengunjung.formbuku_tamu');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'       => 'required|string|max:255',
            'npm'        => 'required|string',
            'tujuan'     => 'required|string',
            'foto_wajah' => 'required'
        ], [
            'nama.required'       => 'Nama lengkap wajib diisi.',
            'npm.required'        => 'NPM/No Anggota wajib diisi.',
            'foto_wajah.required' => 'Anda wajib mengambil foto wajah terlebih dahulu.'
        ]);

        DB::table('buku_tamu')->insert([
            'nama'       => $request->nama,
            'npm'        => $request->npm,
            'tujuan'     => $request->tujuan,
            'foto_wajah' => $request->foto_wajah,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->to('/buku-tamu')->with('success', 'Selamat membaca! Semoga mendapatkan ilmu yang bermanfaat.');
    }
}

