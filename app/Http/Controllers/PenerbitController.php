<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbits = Penerbit::latest()->get();
        return view('Kepala_perpus.tambah-penerbit', compact('penerbits'));
    }

    public function indexPetugas()
    {
        $penerbits = Penerbit::latest()->get();
        return view('petugas.daftar-penerbit', compact('penerbits'));
    }

    public function create()
    {
        return view('Kepala_perpus.tambah-penerbit-form');
    }

    public function editPage($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return view('Kepala_perpus.edit-penerbit', compact('penerbit'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_penerbit' => 'required|string|max:255',
        ]);

        Penerbit::create($request->all());

        return redirect('/daftar-penerbit')->with('sukses', 'Penerbit berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_penerbit' => 'required|string|max:255',
        ]);

        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($request->all());

        return redirect('/daftar-penerbit')->with('sukses', 'Data penerbit berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();

        return redirect('/daftar-penerbit')->with('sukses', 'Penerbit berhasil dihapus!');
    }
}
