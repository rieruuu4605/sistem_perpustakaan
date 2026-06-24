@extends('layouts.index')

@section('halaman', 'Daftar Penerbit / Supplier')
@section('suffix', 'Data penerbit dapat dilihat di sini — pengeditan hanya dapat dilakukan oleh Admin')

@section('main')
    <section class="mt-20 px-6">

        <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 mb-8 flex items-center gap-3">
            <div class="text-[#F99D22] flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                </svg>
            </div>
            <p class="text-amber-800 text-sm font-medium">
                Petugas/Pustakawan hanya dapat melihat data penerbit. Untuk menambah, mengubah, atau menghapus data penerbit, silakan hubungi Admin.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
            @forelse ($penerbits as $penerbit)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between min-h-[160px]">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-[#35094d10] text-[#35094D] flex items-center justify-center rounded-xl flex-shrink-0">
                            <img src="https://api.iconify.design/ri:building-4-fill.svg?color=%2335094D" class="w-6 h-6 object-contain" alt="Penerbit">
                        </div>

                        <div class="flex-1 min-w-0">
                            <h4 class="text-lg font-bold text-[#35094D] truncate">{{ $penerbit->nama_penerbit }}</h4>
                            <p class="text-xs text-gray-400 font-medium mt-0.5">{{ $penerbit->asal_negara_atau_kota ?? 'N/A' }}</p>
                            <p class="text-xs text-gray-500 mt-1 truncate">
                                {{ $penerbit->email ?? '-' }} &bull; {{ $penerbit->telepon ?? '-' }}
                            </p>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-4 mt-4 flex justify-between items-center text-sm">
                        <span class="text-gray-400">Jumlah Buku</span>
                        <span class="font-bold text-[#35094D] text-base">
                            {{ $penerbit->buku_count ?? 0 }} <span class="text-xs font-normal text-gray-400">judul</span>
                        </span>
                    </div>

                </div>
            @empty
                <div class="col-span-1 md:col-span-2 bg-white p-12 rounded-2xl text-center text-gray-400 border border-gray-100">
                    Tidak ada data penerbit yang ditemukan.
                </div>
            @endforelse
        </div>

    </section>
@endsection
