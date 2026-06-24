@extends('layouts.index')

@section('halaman', 'Pencarian Skripsi')
@section('suffix', 'Hanya abstrak yang ditampilkan online — fisik ada di rak perpustakaan')

@section('main')
    <section class="mt-20 px-6">

        <form action="/cari-skripsi" method="GET" class="flex items-center gap-2 mb-8">
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
                        <h3 class="text-lg font-bold text-[#35094D] leading-snug hover:underline cursor-pointer">
                            {{ $skripsi->judul_skripsi }}
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            {{ $skripsi->nama_penulis }} — NPM: {{ $skripsi->npm }} — {{ $skripsi->program_studi }} ({{ $skripsi->tahun_lulus }})
                        </p>

                        <div class="bg-gray-50 p-4 rounded-xl mt-3 border border-gray-100">
                            <span class="text-xs font-bold text-[#35094D] block mb-1">Abstrak:</span>
                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                                {{ $skripsi->abstrak }}
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4">
                            @if($skripsi->nomor_rak && $skripsi->nomor_baris)
                                <span class="bg-[#35094d10] text-[#35094D] text-xs px-3 py-1.5 rounded-md font-medium">
                                    Rak: {{ $skripsi->nomor_rak }} {{ $skripsi->nomor_baris }}
                                </span>
                            @endif

                            @if($skripsi->is_cd_artikel)
                                <span class="bg-emerald-50 text-emerald-600 text-xs px-3 py-1.5 rounded-md font-medium border border-emerald-100">
                                    CD Artikel
                                </span>
                            @endif

                            <span class="bg-orange-50 text-orange-600 text-xs px-3 py-1.5 rounded-md font-medium border border-orange-100">
                                Sumbangan Mahasiswa
                            </span>
                        </div>
                    </div>

                </div>
            @empty
                <div class="bg-white p-12 rounded-xl shadow-sm text-center text-gray-400 border border-gray-100">
                    Tidak ada data skripsi yang ditemukan.
                </div>
            @endforelse
        </div>

    </section>
@endsection
