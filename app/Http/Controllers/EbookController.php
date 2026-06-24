<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ebook;
use App\Models\LogEbook;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class EbookController extends Controller
{
    public function indexAdmin()
    {
        $Ebooks = Ebook::latest()->get();

        $TotalEbook = Ebook::count();
        $TotalDownloads = Ebook::sum('total_download');

        return view('Kepala_perpus.tambah-ebook', compact('Ebooks', 'TotalEbook', 'TotalDownloads'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_ebook' => 'required|string|max:255',
            'penulis'     => 'required|string|max:255',
            'kategori'    => 'required',
            'file_pdf'    => 'required|mimes:pdf|max:51200',
        ]);

        $data = $request->all();

        if ($request->hasFile('file_pdf')) {
            $file = $request->file('file_pdf');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/ebooks', $filename);

            $data['file_pdf'] = $filename;

            if (!$request->ukuran_file) {
                $sizeBytes = $file->getSize();
                $data['ukuran_file'] = round($sizeBytes / 1024 / 1024, 1) . ' MB';
            }
        }

        Ebook::create($data);

        return redirect()->back()->with('success', 'E-Book berhasil diunggah ke sistem!');
    }

    public function indexAnggota(Request $request)
{
    $search = $request->input('cari');
    $kategori = $request->input('kategori');

    $query = Ebook::query();
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('judul_ebook', 'LIKE', "%{$search}%")
              ->orWhere('penulis', 'LIKE', "%{$search}%")
              ->orWhere('kategori', 'LIKE', "%{$search}%");
        });
    }
    if ($kategori) {
        $query->where('kategori', $kategori);
    }

    $Ebooks = $query->latest()->paginate(6)->withQueryString();

    $kategoris = Ebook::whereNotNull('kategori')
        ->where('kategori', '!=', '')
        ->distinct()
        ->orderBy('kategori')
        ->pluck('kategori');

    return view('Anggota.ebook', compact('Ebooks', 'kategoris'));
}

    public function indexLog()
    {
    $LogEbooks = LogEbook::with(['user', 'ebook'])->latest()->paginate(10);
    $TotalDownload = LogEbook::count();
    $PenggunaUnik  = LogEbook::distinct('user_id')->count('user_id');
    $HariIni       = LogEbook::whereDate('created_at', Carbon::today())->count();

    return view('petugas.log-ebook', compact('LogEbooks', 'TotalDownload', 'PenggunaUnik', 'HariIni'));
    }

    public function download($id)
    {
        $ebook = Ebook::findOrFail($id);
        $filePath = 'public/ebooks/' . $ebook->file_pdf;

        if (Storage::exists($filePath)) {

            LogEbook::create([
                'user_id' => Auth::id(),
                'ebook_id' => $ebook->id
            ]);

            $ebook->increment('total_download');

            return Storage::download($filePath, $ebook->judul_ebook . '.pdf');
        }

        return redirect()->back()->with('error', 'Berkas PDF tidak ditemukan di server.');
    }

    public function destroy($id)
    {
        $ebook = \App\Models\Ebook::findOrFail($id);


        if ($ebook->file_pdf) {
            \Illuminate\Support\Facades\Storage::delete('public/ebooks/' . $ebook->file_pdf);
        }

        $ebook->delete();
        return redirect()->back()->with('success', 'E-Book berhasil dihapus!');
    }
}
