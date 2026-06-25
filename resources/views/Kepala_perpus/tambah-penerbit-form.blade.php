@extends('layouts.index')
@section('halaman', 'Daftar Penerbit')
@section('main')

<section class="bg-white mt-10 p-10 rounded-lg">
    <form action="/daftar-penerbit" method="POST" class="all_form flex gap-12">
        @csrf

        {{-- Sisi Kiri --}}
        <div class="w-1/2 flex justify-center items-start pt-4">
            <div class="w-[350px] flex flex-col items-center text-center">
                <div class="w-24 h-24 bg-[#35094D] rounded-2xl flex items-center justify-center mb-4">
                    <img src="https://api.iconify.design/ri:building-4-fill.svg?color=%23ffffff" class="w-12 h-12" alt="">
                </div>
                <p class="text-[#35094D] font-bold text-lg">Tambah Penerbit</p>
                <p class="text-gray-400 text-sm mt-1">Data supplier / penerbit buku perpustakaan</p>

                <div class="mt-8 w-full text-left space-y-2">
                    <p class="text-xs text-gray-400 font-semibold uppercase">Panduan</p>
                    <p class="text-xs text-gray-500">• Nama penerbit wajib diisi</p>
                    <p class="text-xs text-gray-500">• Alamat, email, telepon bersifat opsional</p>
                    <p class="text-xs text-gray-500">• Website diisi tanpa spasi</p>
                </div>
            </div>
        </div>

        {{-- Sisi Kanan --}}
        <div class="w-1/2 space-y-4">

            <div>
                <label class="text-gray-600 text-sm font-semibold">Nama Penerbit *</label>
                @error('nama_penerbit') <div class="text-red-500 text-[14px]">{{ $message }}</div> @enderror
                <input type="text" name="nama_penerbit" placeholder="Contoh: Gramedia Pustaka Utama"
                    class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400"
                    value="{{ old('nama_penerbit') }}">
            </div>

            <div>
                <label class="text-gray-600 text-sm font-semibold">Alamat</label>
                <input type="text" name="alamat" placeholder="Alamat lengkap penerbit"
                    class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400"
                    value="{{ old('alamat') }}">
            </div>

            <div>
                <label class="text-gray-600 text-sm font-semibold">Email</label>
                <input type="email" name="email" placeholder="email@penerbit.com"
                    class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400"
                    value="{{ old('email') }}">
            </div>

            <div>
                <label class="text-gray-600 text-sm font-semibold">Telepon</label>
                <input type="text" name="telepon" placeholder="Contoh: 02155001234"
                    class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400"
                    value="{{ old('telepon') }}">
            </div>

            <div>
                <label class="text-gray-600 text-sm font-semibold">Website</label>
                <input type="text" name="website" placeholder="https://www.penerbit.com"
                    class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400"
                    value="{{ old('website') }}">
            </div>

            <div class="flex gap-4 pt-4">
                <button type="button" onclick="window.location='/daftar-penerbit'"
                    class="px-6 py-2 border border-purple-900 text-purple-900 rounded-md">
                    Kembali
                </button>
                <button type="submit"
                    class="btn_simpan_perubahan bg-[#35094D] text-white py-2 px-10 cursor-pointer rounded flex items-center gap-2">
                    <svg class="spinner_load hidden animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="text_simpan">Simpan Penerbit</span>
                </button>
            </div>
        </div>
    </form>
</section>
@endsection