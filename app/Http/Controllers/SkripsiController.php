<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skripsi;

class SkripsiController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->get('cari');

        $skripsis = Skripsi::when($cari, function ($query) use ($cari) {
            return $query->where('judul_skripsi', 'like', "%{$cari}%")
                         ->orWhere('nama_penulis', 'like', "%{$cari}%")
                         ->orWhere('npm', 'like', "%{$cari}%");
        })->latest()->get();

        return view('Kepala_perpus.skripsi', compact('skripsis'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul_skripsi' => 'required|string',
            'nama_penulis'  => 'required|string',
            'npm'           => 'required|string',
            'program_studi' => 'required|string',
            'abstrak'       => 'required|string',
        ]);

        $isCd = $request->has('is_cd_artikel') ? true : false;

        Skripsi::create([
            'judul_skripsi' => $request->judul_skripsi,
            'nama_penulis'  => $request->nama_penulis,
            'npm'           => $request->npm,
            'program_studi' => $request->program_studi,
            'tahun_lulus'   => $request->tahun_lulus,
            'nomor_rak'     => $request->nomor_rak,
            'nomor_baris'   => $request->nomor_baris,
            'is_cd_artikel' => $isCd,
            'abstrak'       => $request->abstrak,
        ]);

        return redirect('/koleksi-skripsi')->with('sukses', 'Skripsi berhasil ditambahkan!');
    }
}
