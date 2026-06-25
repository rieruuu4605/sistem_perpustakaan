@extends('layouts.index')
@section('halaman', 'Koleksi Skripsi')
@section('main')

<section class="bg-white mt-10 p-10 rounded-lg">
    <form action="/koleksi-skripsi/{{ $skripsi->id }}" method="POST" class="all_form flex gap-12">
        @csrf
        @method('PUT')

        {{-- Sisi Kiri --}}
        <div class="w-1/2 flex justify-center items-start pt-4">
            <div class="w-[350px] flex flex-col items-center text-center">
                <div class="w-24 h-24 bg-[#35094D] rounded-2xl flex items-center justify-center mb-4">
                    <img src="https://api.iconify.design/ri:graduation-cap-fill.svg?color=%23ffffff" class="w-12 h-12" alt="">
                </div>
                <p class="text-[#35094D] font-bold text-lg">Edit Skripsi</p>
                <p class="text-gray-400 text-sm mt-1">Perbarui data skripsi / tugas akhir</p>

                <div class="mt-8 w-full text-left space-y-2">
                    <p class="text-xs text-gray-400 font-semibold uppercase">Info</p>
                    <p class="text-xs text-gray-500">• Judul, penulis, NPM, prodi wajib diisi</p>
                    <p class="text-xs text-gray-500">• Nomor rak & baris sesuai lokasi fisik</p>
                    <p class="text-xs text-gray-500">• Centang CD jika ada artikel ilmiah</p>
                </div>
            </div>
        </div>

        {{-- Sisi Kanan --}}
        <div class="w-1/2 space-y-4">

            <div>
                <label class="text-gray-600 text-sm font-semibold">Judul Skripsi *</label>
                @error('judul_skripsi') <div class="text-red-500 text-[14px]">{{ $message }}</div> @enderror
                <input type="text" name="judul_skripsi" placeholder="Judul skripsi / tugas akhir"
                    class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400"
                    value="{{ old('judul_skripsi', $skripsi->judul_skripsi) }}">
            </div>

            <div>
                <label class="text-gray-600 text-sm font-semibold">Nama Penulis *</label>
                @error('nama_penulis') <div class="text-red-500 text-[14px]">{{ $message }}</div> @enderror
                <input type="text" name="nama_penulis" placeholder="Nama lengkap penulis"
                    class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400"
                    value="{{ old('nama_penulis', $skripsi->nama_penulis) }}">
            </div>

            <div class="flex gap-4">
                <div class="w-1/2">
                    <label class="text-gray-600 text-sm font-semibold">NPM *</label>
                    @error('npm') <div class="text-red-500 text-[14px]">{{ $message }}</div> @enderror
                    <input type="text" name="npm" placeholder="NPM penulis"
                        class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400"
                        value="{{ old('npm', $skripsi->npm) }}">
                </div>
                <div class="w-1/2">
                    <label class="text-gray-600 text-sm font-semibold">Tahun Lulus</label>
                    <input type="text" name="tahun_lulus" placeholder="Contoh: 2024"
                        class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400"
                        value="{{ old('tahun_lulus', $skripsi->tahun_lulus) }}">
                </div>
            </div>

            <div>
                <label class="text-gray-600 text-sm font-semibold">Program Studi *</label>
                @error('program_studi') <div class="text-red-500 text-[14px]">{{ $message }}</div> @enderror
                <input type="text" name="program_studi" placeholder="Contoh: Ilmu Komputer"
                    class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400"
                    value="{{ old('program_studi', $skripsi->program_studi) }}">
            </div>

            {{-- Nomor Rak --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Rak</label>
                <div class="flex gap-3">
                    <div class="flex flex-col gap-1 w-1/2">
                        <label class="text-xs text-gray-400">Rak (A–Z)</label>
                        <select name="nomor_rak"
                            class="w-full border border-gray-300 rounded-md px-4 py-2 outline-none focus:border-[#35094D] transition-colors">
                            <option value="">-- Pilih --</option>
                            @foreach(range('A', 'Z') as $huruf)
                                <option value="{{ $huruf }}" {{ old('nomor_rak', $skripsi->nomor_rak) == $huruf ? 'selected' : '' }}>
                                    Rak {{ $huruf }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1 w-1/2">
                        <label class="text-xs text-gray-400">Baris (1–4)</label>
                        <select name="nomor_baris"
                            class="w-full border border-gray-300 rounded-md px-4 py-2 outline-none focus:border-[#35094D] transition-colors">
                            <option value="">-- Pilih --</option>
                            @foreach(range(1, 4) as $angka)
                                <option value="{{ $angka }}" {{ old('nomor_baris', $skripsi->nomor_baris) == $angka ? 'selected' : '' }}>
                                    Baris {{ $angka }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div>
                <label class="text-gray-600 text-sm font-semibold">Abstrak *</label>
                @error('abstrak') <div class="text-red-500 text-[14px]">{{ $message }}</div> @enderror
                <textarea name="abstrak" rows="4" placeholder="Ringkasan isi skripsi..."
                    class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400">{{ old('abstrak', $skripsi->abstrak) }}</textarea>
            </div>

            <div>
                <label class="flex items-center gap-2 cursor-pointer select-none text-sm font-semibold text-gray-600">
                    <input type="checkbox" name="is_cd_artikel" value="1"
                        {{ old('is_cd_artikel', $skripsi->is_cd_artikel) ? 'checked' : '' }}
                        class="w-4 h-4 rounded border-gray-300 text-[#35094D] focus:ring-[#35094D]">
                    <span>Disertai CD Artikel Ilmiah</span>
                </label>
            </div>

            <div class="flex gap-4 pt-4">
                <button type="button" onclick="window.location='/koleksi-skripsi'"
                    class="px-6 py-2 border border-purple-900 text-purple-900 rounded-md">
                    Kembali
                </button>
                <button type="submit"
                    class="btn_simpan_perubahan bg-[#35094D] text-white py-2 px-10 cursor-pointer rounded flex items-center gap-2">
                    <svg class="spinner_load hidden animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="text_simpan">Simpan Perubahan</span>
                </button>
            </div>
        </div>
    </form>
</section>
@endsection