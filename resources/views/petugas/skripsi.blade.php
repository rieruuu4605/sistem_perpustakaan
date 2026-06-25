@extends('layouts.index')
@section('halaman', 'Koleksi Skripsi & Tugas Akhir')
@section('main')
    <section class="mt-20 px-6">
        <div class="mb-6">
            <h2 class="text-2xl font-bold text-[#35094D]">Koleksi Skripsi & Tugas Akhir</h2>
            <p class="text-gray-500 text-sm">Repositori skripsi dan artikel ilmiah mahasiswa</p>
        </div>

        <form action="/koleksi-skripsi" method="GET" class="flex items-center gap-2 mb-8">
            <div class="relative w-full max-w-[450px]">
                <input name="cari" type="text" placeholder="Cari judul, penulis, NPM..."
                    class="bg-white w-full pl-11 pr-4 py-3 rounded-md border border-gray-200 focus:outline-none focus:border-[#35094D]"
                    value="{{ request('cari') }}">
            </div>
            <button type="submit" class="bg-[#35094D] text-white px-6 py-3 rounded-md hover:bg-[#250636] transition-colors">Cari</button>
        </form>

        <div class="space-y-4 mb-10">
            @forelse($skripsis as $skripsi)
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-start gap-4">
                    <div class="w-12 h-12 bg-[#35094D] text-white flex items-center justify-center rounded-xl flex-shrink-0">
                        <img src="https://api.iconify.design/ri:graduation-cap-fill.svg?color=%23ffffff" class="w-6 h-6 object-contain" alt="Skripsi">
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-[#35094D] leading-snug">
                            {{ $skripsi->judul_skripsi }}
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ $skripsi->nama_penulis }} — NPM: {{ $skripsi->npm }} — {{ $skripsi->program_studi }} ({{ $skripsi->tahun_lulus }})
                        </p>
                        <p class="text-gray-600 text-sm mt-2 line-clamp-2">{{ $skripsi->abstrak }}</p>
                        <div class="flex flex-wrap gap-2 mt-4">
                            @if($skripsi->nomor_rak && $skripsi->nomor_baris)
                                <span class="bg-[#35094d10] text-[#35094D] text-xs px-3 py-1.5 rounded-md font-medium">
                                    Rak: {{ $skripsi->nomor_rak }} Baris {{ $skripsi->nomor_baris }}
                                </span>
                            @endif
                            @if($skripsi->is_cd_artikel)
                                <span class="bg-emerald-50 text-emerald-600 text-xs px-3 py-1.5 rounded-md font-medium border border-emerald-100">
                                    CD Artikel
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white p-12 rounded-xl shadow-sm text-center text-gray-400 border border-gray-100">
                    Data skripsi tidak ditemukan.
                </div>
            @endforelse
        </div>

        {{ $skripsis->links() }}
    </section>
@endsection