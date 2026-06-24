@extends('layouts.index')

@section('halaman', 'Kelola Buku')

@section('main')

    <section class="bg-white mt-10 p-10 rounded-lg">
        <form action="/kelola-buku" method="POST" class="all_form flex gap-12" enctype="multipart/form-data">
            @csrf
            <div class="w-1/2 flex justify-center items-center">
                <div class="w-[350px] flex flex-col items-center text-center relative">
                    <div class="mb-6">
                        <img id="previewImage" src="{{ asset('icons/no-image.jpg') }}"
                            class="photoPreview w-[120px] h-auto shadow-lg rounded-sm object-cover" alt="Cover Buku">
                    </div>
                    <input name="cover_buku" type="file" id="imageInput" class="photoInput hidden">

                    <button type="button"
                        class="uploadBtn bg-[#35094D] hover:bg-[#4a0d6b] text-white px-8 py-2 rounded-md cursor-pointer text-sm font-semibold transition-colors duration-200">
                        Edit Cover
                    </button>

                    <p class="text-xs mt-6 text-gray-400 font-medium @error('cover_buku') text-red-500 @enderror">
                        Hanya Mendukung File Berbentuk <br>
                        Png, Jpg, Jpeg
                    </p>
                </div>
            </div>

            <!-- Form -->
            <div class="w-1/2 space-y-4">
                <div>
                    <label class="text-gray-600 text-sm font-semibold">Kode Buku*</label>
                    @error('kode_buku')
                        <div class="text-red-500 text-[14px]">{{ $message }}</div>
                    @enderror
                    <input type="text" placeholder="Kode buku" name="kode_buku"
                        class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400"
                        value="{{ old('kode_buku') }}">
                </div>

                <div>
                    <label class="text-gray-600 text-sm font-semibold">Judul Buku*</label>
                    @error('judul_buku')
                        <div class="text-red-500 text-[14px]">{{ $message }}</div>
                    @enderror
                    <input type="text" placeholder="Judul Buku" name="judul_buku"
                        class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400"
                        value="{{ old('judul_buku') }}">
                </div>

                <div>
                    <label class="text-gray-600 text-sm font-semibold">Penulis*</label>
                    @error('penulis')
                        <div class="text-red-500 text-[14px]">{{ $message }}</div>
                    @enderror
                    <input type="text" placeholder="Penulis" name="penulis"
                        class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400"
                        value="{{ old('penulis') }}">
                </div>

                {{-- Input Kategori --}}
                <div class="mb-4">
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <input type="text" id="kategori" name="kategori" 
                        value="{{ old('kategori', $buku->kategori ?? '') }}" 
                        placeholder="Contoh: Fiksi, Edukasi..."
                        class="w-full border border-gray-300 rounded-md px-4 py-2 outline-none focus:border-[#35094D] transition-colors @error('kategori') border-red-500 @enderror">
                    @error('kategori')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                    {{-- Input Penerbit --}}
                <div class="mb-4">
                    <label for="penerbit" class="block text-sm font-medium text-gray-700 mb-1">Penerbit</label>
                    <input type="text" id="penerbit" name="penerbit" 
                        value="{{ old('penerbit', $buku->penerbit ?? '') }}" 
                        placeholder="Contoh: Gramedia, Bentang Pustaka..."
                        class="w-full border border-gray-300 rounded-md px-4 py-2 outline-none focus:border-[#35094D] transition-colors @error('penerbit') border-red-500 @enderror">
                    @error('penerbit')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Rak --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Rak</label>
                    <div class="flex gap-3">
                        <div class="flex flex-col gap-1 w-1/2">
                            <label class="text-xs text-gray-400">Baris (A–Z)</label>
                            <select name="rak_baris"
                                class="w-full border border-gray-300 rounded-md px-4 py-2 outline-none focus:border-[#35094D] transition-colors">
                                <option value="">-- Pilih --</option>
                                @foreach(range('A', 'Z') as $huruf)
                                    <option value="{{ $huruf }}" {{ old('rak_baris') == $huruf ? 'selected' : '' }}>
                                        Baris {{ $huruf }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1 w-1/2">
                            <label class="text-xs text-gray-400">Tinggi (1–4)</label>
                            <select name="rak_tinggi"
                                class="w-full border border-gray-300 rounded-md px-4 py-2 outline-none focus:border-[#35094D] transition-colors">
                                <option value="">-- Pilih --</option>
                                @foreach(range(1, 4) as $angka)
                                    <option value="{{ $angka }}" {{ old('rak_tinggi') == $angka ? 'selected' : '' }}>
                                        Tinggi {{ $angka }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 mt-1">Contoh: Baris A + Tinggi 2 = Rak <strong>A2</strong></p>
                </div>  

                <div>
                    <label class="text-gray-600 text-sm font-semibold">Sinopsis*</label>
                    @error('sinopsis')
                        <div class="text-red-500 text-[14px]">{{ $message }}</div>
                    @enderror
                    <textarea placeholder="sinopsis" name="sinopsis"
                        class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400">{{ old('sinopsis') }}</textarea>
                </div>

                <div>
                    <label class="text-gray-600 text-sm font-semibold">Tahun terbit*</label>
                    @error('tahun_terbit')
                        <div class="text-red-500 text-[14px]">{{ $message }}</div>
                    @enderror
                    <input name="tahun_terbit" type="date"
                        class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400"
                        value="{{ old('tahun_terbit') }}">
                </div>


                <div>
                    <label class="text-gray-600 text-sm font-semibold">Stok Buku*</label>
                    @error('stok_buku')
                        <div class="text-red-500 text-[14px]">{{ $message }}</div>
                    @enderror
                    <input type="number" placeholder="Stok Buku" name="stok_buku"
                        class="w-full border rounded-md px-4 py-2 mt-1 border-gray-300 text-gray-400"
                        value="{{ old('stok_buku') }}">
                </div>

                <!-- Button -->
                <div class="flex gap-4 pt-4">
                    <button type="button" onclick="window.location='/kelola-buku'"
                        class="px-6 py-2 border border-purple-900 text-purple-900 rounded-md">
                        Kembali
                    </button>

                    <button id="" type="submit"
                        class="btn_simpan_perubahan bg-[#35094D] text-white py-2 px-10 cursor-pointer rounded flex items-center gap-2">
                        <svg id="" class="spinner_load hidden animate-spin h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span class="text_simpan">Simpan Perubahan</span>
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection
