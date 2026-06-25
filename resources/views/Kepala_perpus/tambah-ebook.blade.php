@extends('layouts.index')

@section('halaman', 'Input E-Book')
@section('suffix', 'Admin!')

@section('main')
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 my-16">
        <div class="bg-[#35094D] p-6 rounded-[32px] shadow-sm">
            <div class="flex flex-col gap-4">
                <span class="text-[20px] text-[#FFFFFF] leading-snug">Total E-Book</span>
                <span class="text-5xl font-bold text-[#FFFFFF]">{{ $TotalEbook ?? '3' }}</span>
                <span class="text-[#FFFFFF90] text-[10px]">
                    *Menampilkan Jumlah Koleksi <br> E-Book Saat Ini
                </span>
            </div>
        </div>

        <div class="bg-[#F99D22] p-6 rounded-[32px] shadow-sm">
            <div class="flex flex-col gap-4">
                <span class="text-[20px] text-[#FFFFFF] leading-snug">Total Downloads</span>
                <span class="text-5xl font-bold text-[#FFFFFF]">{{ $TotalDownloads ?? '3,095' }}</span>
                <span class="text-[#FFFFFF90] text-[10px]">
                    *Akumulasi Unduhan Seluruh <br> Berkas E-Book
                </span>
            </div>
        </div>

        <div class="bg-[#0B4B88] p-6 rounded-[32px] shadow-sm">
            <div class="flex flex-col gap-4">
                <span class="text-[20px] text-[#FFFFFF] leading-snug">Kapasitas Maks/File</span>
                <span class="text-5xl font-bold text-[#FFFFFF]">50 MB</span>
                <span class="text-[#FFFFFF90] text-[10px]">
                    *Batas Ukuran Maksimal Dokumen <br> PDF yang Diizinkan
                </span>
            </div>
        </div>
    </section>

    <section class="mb-20">
        <div class="flex justify-between items-center mb-4">
            <span class="text-[20px] font-semibold text-[#35094D]">
                Kelola Koleksi E-Book
            </span>
            <a href="/tambah-ebook" class="bg-[#35094D] text-white px-5 py-2.5 rounded-xl font-medium text-sm hover:bg-[#35094D]/90 transition-all shadow-sm flex items-center gap-2">
                <img src="https://api.iconify.design/ri:add-fill.svg?color=%23ffffff" class="w-4 h-4" alt="">
                Upload E-Book
            </a>
        </div>

        <div class="bg-white w-full rounded-2xl p-6 shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="text-left border-b border-gray-100 text-sm">
                        <th class="pb-4 text-gray-400 font-semibold uppercase text-xs">Judul</th>
                        <th class="pb-4 text-gray-400 font-semibold uppercase text-xs">Pengarang</th>
                        <th class="pb-4 text-gray-400 font-semibold uppercase text-xs">Kategori</th>
                        <th class="pb-4 text-gray-400 font-semibold uppercase text-xs">Tahun</th>
                        <th class="pb-4 text-gray-400 font-semibold uppercase text-xs">Ukuran</th>
                        <th class="pb-4 text-gray-400 font-semibold uppercase text-xs text-center">Downloads</th>
                        <th class="pb-4 text-gray-400 font-semibold uppercase text-xs">Diupload</th>
                        <th class="pb-4 text-gray-400 font-semibold uppercase text-xs text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-[#35094D] text-[15px]">
                    @forelse ($Ebooks as $ebook)
                        <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 font-bold">{{ $ebook->judul_ebook }}</td>
                            <td class="py-4 text-gray-500">{{ $ebook->penulis }}</td>
                            <td class="py-4">
                                <span class="bg-purple-50 text-[#35094D] px-2.5 py-1 rounded-lg text-xs font-semibold border border-purple-100">
                                    {{ $ebook->kategori }}
                                </span>
                            </td>
                            <td class="py-4 text-gray-500">{{ $ebook->tahun_terbit }}</td>
                            <td class="py-4 text-gray-500">{{ $ebook->ukuran_file }}</td>
                            <td class="py-4 text-center font-bold text-[#0B4B88]">{{ number_format($ebook->total_download) }}</td>
                            <td class="py-4 text-gray-400 font-medium">Admin</td>
                            <td class="py-4">
                                <div class="flex justify-center items-center gap-3">
                                    <a href="/edit-ebook/{{ $ebook->id }}"
                                        class="text-blue-500 hover:text-blue-700 transition-colors flex items-center">
                                        <img src="https://api.iconify.design/ri:edit-line.svg?color=%233b82f6" class="w-5 h-5" alt="Edit">
                                    </a>
                                    <form action="/hapus-ebook/{{ $ebook->id }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus e-book ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 transition-colors flex items-center">
                                            <img src="https://api.iconify.design/ri:delete-bin-line.svg?color=%23ef4444" class="w-5 h-5" alt="Hapus">
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-12 text-gray-400 italic bg-gray-50/50 rounded-xl">
                                Tidak ada data e-book yang ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if ($Ebooks->hasPages())
                <div class="mt-6 flex justify-end">
                    {{ $Ebooks->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection