<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PengunjungController extends Controller 
{
    public function index(Request $request)
    {
        // 1. Ambil tanggal dari input user, jika kosong set ke hari ini secara otomatis
        $tanggal = $request->input('tanggal', Carbon::today()->format('Y-m-d'));

        // 2. Ambil data pengunjung berdasarkan tanggal
        $pengunjung = BukuTamu::whereDate('created_at', $tanggal)
                              ->latest()
                              ->get();

        return view('buku-tamu.daftar-pengunjung', compact('pengunjung', 'tanggal'));
    }

    public function daftarTamuPetugas(Request $request)
    {
        $tanggal = $request->input('tanggal', Carbon::today()->format('Y-m-d'));

        $pengunjung = BukuTamu::whereDate('created_at', $tanggal)
                              ->latest()
                              ->get();

        return view('petugas.daftar-tamu', compact('pengunjung', 'tanggal'));
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
            'nama.required'      => 'Nama lengkap wajib diisi.',
            'npm.required'       => 'NPM/No Anggota wajib diisi.',
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