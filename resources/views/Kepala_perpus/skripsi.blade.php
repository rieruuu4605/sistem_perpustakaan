@extends('layouts.index')
@section('halaman', 'Koleksi Skripsi & Tugas Akhir')
@section('main')
    <section class="mt-20 px-6">
        <div class="mb-6 flex justify-between items-start">
            <div>
                <h2 class="text-2xl font-bold text-[#35094D]">Koleksi Skripsi & Tugas Akhir</h2>
                <p class="text-gray-500 text-sm">Repositori skripsi dan artikel ilmiah mahasiswa</p>
            </div>
            <button onclick="toggleModal('modalInputSkripsi')" class="bg-[#35094D] hover:bg-[#250636] text-white px-6 py-3 rounded-md font-medium flex items-center gap-2 shadow-sm transition-colors">
                <span>+ Input Skripsi</span>
            </button>
        </div>

        <form action="/koleksi-skripsi" method="GET" class="flex items-center gap-2 mb-8">
            <div class="relative w-full max-w-[450px]">
                <input name="cari" type="text" placeholder="Cari judul, penulis, NPM..." class="bg-white w-full pl-11 pr-4 py-3 rounded-md border border-gray-200 focus:outline-none focus:border-[#35094D]" value="{{ request('cari') }}">
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
                        <p class="text-gray-600 text-sm mt-2 line-clamp-2">
                            {{ $skripsi->abstrak }}
                        </p>

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
                            <span class="bg-purple-50 text-purple-600 text-xs px-3 py-1.5 rounded-md font-medium border border-purple-100">
                                Sumbangan Mahasiswa
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white p-12 rounded-xl shadow-sm text-center text-gray-400 border border-gray-100">
                    Data skripsi tidak ditemukan.
                </div>
            @endforelse
        </div>
    </section>

    <div id="modalInputSkripsi" class="hidden fixed inset-0 z-50 overflow-y-auto bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-2xl rounded-xl shadow-2xl overflow-hidden transform transition-all my-8">
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <h3 class="text-lg font-bold text-[#35094D]">Input Skripsi / Tugas Akhir</h3>
                <button onclick="toggleModal('modalInputSkripsi')" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <form action="/koleksi-skripsi/simpan" method="POST" class="p-6 space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-[#35094D] mb-1">Judul Skripsi *</label>
                        <input type="text" name="judul_skripsi" required class="w-full px-4 py-2.5 rounded-md bg-gray-50 border border-gray-200 focus:outline-none focus:border-[#35094D] focus:bg-white text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#35094D] mb-1">Nama Penulis *</label>
                        <input type="text" name="nama_penulis" required class="w-full px-4 py-2.5 rounded-md bg-gray-50 border border-gray-200 focus:outline-none focus:border-[#35094D] focus:bg-white text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#35094D] mb-1">NPM *</label>
                        <input type="text" name="npm" required class="w-full px-4 py-2.5 rounded-md bg-gray-50 border border-gray-200 focus:outline-none focus:border-[#35094D] focus:bg-white text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#35094D] mb-1">Program Studi *</label>
                        <input type="text" name="program_studi" required class="w-full px-4 py-2.5 rounded-md bg-gray-50 border border-gray-200 focus:outline-none focus:border-[#35094D] focus:bg-white text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#35094D] mb-1">Tahun Lulus</label>
                        <input type="text" name="tahun_lulus" class="w-full px-4 py-2.5 rounded-md bg-gray-50 border border-gray-200 focus:outline-none focus:border-[#35094D] focus:bg-white text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#35094D] mb-1">Nomor Rak</label>
                        <input type="text" name="nomor_rak" class="w-full px-4 py-2.5 rounded-md bg-gray-50 border border-gray-200 focus:outline-none focus:border-[#35094D] focus:bg-white text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-[#35094D] mb-1">Nomor Baris</label>
                        <input type="text" name="nomor_baris" class="w-full px-4 py-2.5 rounded-md bg-gray-50 border border-gray-200 focus:outline-none focus:border-[#35094D] focus:bg-white text-sm">
                    </div>
                    <div class="flex items-end pb-3">
                        <label class="flex items-center gap-2 cursor-pointer select-none text-sm font-semibold text-[#35094D]">
                            <input type="checkbox" name="is_cd_artikel" value="1" class="w-4 h-4 rounded border-gray-300 text-[#35094D] focus:ring-[#35094D]">
                            <span>Disertai CD Artikel Ilmiah</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-[#35094D] mb-1">Abstrak *</label>
                    <textarea name="abstrak" rows="4" required class="w-full px-4 py-2.5 rounded-md bg-gray-50 border border-gray-200 focus:outline-none focus:border-[#35094D] focus:bg-white text-sm resize-none"></textarea>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                    <button type="button" onclick="toggleModal('modalInputSkripsi')" class="w-full sm:w-auto px-6 py-2.5 border border-gray-300 rounded-md text-gray-700 font-medium hover:bg-gray-50 transition-colors text-sm text-center">
                        Batal
                    </button>
                    <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-[#35094D] text-white rounded-md font-medium hover:bg-[#250636] transition-colors text-sm text-center">
                        Simpan Skripsi
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
    </script>
@endsection
