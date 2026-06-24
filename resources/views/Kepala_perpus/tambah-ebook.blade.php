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
            <button onclick="toggleModal('modalUpload')" class="bg-[#35094D] text-white px-5 py-2.5 rounded-xl font-medium text-sm hover:bg-[#35094D]/90 transition-all shadow-sm flex items-center gap-2">
                <img src="https://api.iconify.design/ri:add-fill.svg?color=%23ffffff" class="w-4 h-4" alt="">
                Upload E-Book
            </button>
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
                                    <button type="button"
                                        onclick="bukaModalEdit({{ $ebook->id }}, '{{ addslashes($ebook->judul_ebook) }}', '{{ addslashes($ebook->penulis) }}', '{{ $ebook->tahun_terbit }}', '{{ addslashes($ebook->kategori) }}', '{{ $ebook->ukuran_file }}', '{{ addslashes($ebook->sinopsis ?? '') }}')"
                                        class="text-blue-500 hover:text-blue-700 transition-colors flex items-center">
                                        <img src="https://api.iconify.design/ri:edit-line.svg?color=%233b82f6" class="w-5 h-5" alt="Edit">
                                    </button>
                                    {{-- Tombol Hapus --}}
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

    <div id="modalUpload" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center p-4 backdrop-blur-sm transition-opacity">
        <div class="bg-white rounded-3xl max-w-xl w-full p-8 shadow-2xl relative transform transition-all scale-100">

            <h3 class="text-2xl font-bold text-[#35094D] mb-1">Upload E-Book Baru</h3>
            <p class="text-sm text-gray-400 mb-6">Kelola koleksi e-book — Admin dapat input tanpa batasan (maks 50 MB per file)</p>

            <form action="/simpan-ebook" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-[#35094D]">Judul E-Book *</label>
                        <input type="text" name="judul_ebook" required class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#35094D] transition-colors" placeholder="Masukkan judul">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-[#35094D]">Pengarang *</label>
                        <input type="text" name="penulis" required class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#35094D] transition-colors" placeholder="Nama pengarang">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-[#35094D]">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#35094D] transition-colors" placeholder="Contoh: 2026">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-[#35094D]">Ukuran (MB) *</label>
                        <input type="text" name="ukuran_file" required class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#35094D] transition-colors" placeholder="Contoh: 12.4 MB">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-[#35094D]">Kategori</label>
                        <select name="kategori" class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#35094D] transition-colors appearance-none">
                            <option value="Teknologi">Teknologi</option>
                            <option value="Sains">Sains</option>
                            <option value="Humaniora">Humaniora</option>
                        </select>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-[#35094D]">File E-Book (simulasi)</label>
                        <label class="w-full flex items-center justify-center gap-2 border-2 border-dashed border-gray-200 bg-gray-50 rounded-xl px-4 py-3 text-sm text-gray-400 cursor-pointer hover:bg-gray-100 transition-colors">
                            <img src="https://api.iconify.design/ri:cloud-upload-line.svg?color=%239ca3af" class="w-4 h-4" alt="">
                            <span>Klik untuk pilih file PDF</span>
                            <input type="file" name="file_pdf" class="hidden" id="pdfInput" >
                        </label>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-[#35094D]">Sinopsis</label>
                    <textarea name="sinopsis" rows="3" class="w-full bg-gray-50 border border-gray-100 rounded-xl p-4 text-sm focus:outline-none focus:border-[#35094D] transition-colors resize-none" placeholder="Tulis deskripsi atau sinopsis singkat buku..."></textarea>
                </div>

                <div class="flex gap-4 mt-4">
                    <button type="button" onclick="toggleModal('modalUpload')" class="flex-1 bg-white border border-gray-200 text-gray-700 py-3 rounded-xl font-semibold text-sm hover:bg-gray-50 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 bg-[#35094D] text-white py-3 rounded-xl font-semibold text-sm hover:bg-[#35094D]/90 transition-colors shadow-sm">
                        Simpan E-Book
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalEdit" class="fixed inset-0 z-50 hidden bg-black/50 flex items-center justify-center p-4 backdrop-blur-sm">
        <div class="bg-white rounded-3xl max-w-xl w-full p-8 shadow-2xl relative">
            <h3 class="text-2xl font-bold text-[#35094D] mb-1">Edit E-Book</h3>
            <p class="text-sm text-gray-400 mb-6">Perbarui informasi e-book yang sudah tersimpan</p>

            <form id="formEdit" action="" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-[#35094D]">Judul E-Book *</label>
                        <input type="text" name="judul_ebook" id="edit_judul" required
                            class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#35094D]">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-[#35094D]">Pengarang *</label>
                        <input type="text" name="penulis" id="edit_penulis" required
                            class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#35094D]">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-[#35094D]">Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" id="edit_tahun"
                            class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#35094D]">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-[#35094D]">Ukuran (MB)</label>
                        <input type="text" name="ukuran_file" id="edit_ukuran"
                            class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#35094D]">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-[#35094D]">Kategori</label>
                        <select name="kategori" id="edit_kategori"
                            class="w-full bg-gray-50 border border-gray-100 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-[#35094D]">
                            <option value="Teknologi">Teknologi</option>
                            <option value="Sains">Sains</option>
                            <option value="Humaniora">Humaniora</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-[#35094D]">Ganti File PDF</label>
                        <label class="w-full flex items-center justify-center gap-2 border-2 border-dashed border-gray-200 bg-gray-50 rounded-xl px-4 py-3 text-sm text-gray-400 cursor-pointer hover:bg-gray-100">
                            <img src="https://api.iconify.design/ri:cloud-upload-line.svg?color=%239ca3af" class="w-4 h-4" alt="">
                            <span>Opsional — biarkan kosong</span>
                            <input type="file" name="file_pdf" class="hidden">
                        </label>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-sm font-semibold text-[#35094D]">Sinopsis</label>
                    <textarea name="sinopsis" id="edit_sinopsis" rows="3"
                        class="w-full bg-gray-50 border border-gray-100 rounded-xl p-4 text-sm focus:outline-none focus:border-[#35094D] resize-none"></textarea>
                </div>

                <div class="flex gap-4 mt-2">
                    <button type="button" onclick="toggleModal('modalEdit')"
                        class="flex-1 bg-white border border-gray-200 text-gray-700 py-3 rounded-xl font-semibold text-sm hover:bg-gray-50">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex-1 bg-[#35094D] text-white py-3 rounded-xl font-semibold text-sm hover:bg-[#35094D]/90 shadow-sm">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            } else {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }
        }

        function bukaModalEdit(id, judul, penulis, tahun, kategori, ukuran, sinopsis) {
            document.getElementById('edit_judul').value   = judul;
            document.getElementById('edit_penulis').value = penulis;
            document.getElementById('edit_tahun').value   = tahun;
            document.getElementById('edit_ukuran').value  = ukuran;
            document.getElementById('edit_sinopsis').value = sinopsis;

            const selectKategori = document.getElementById('edit_kategori');
            for (let opt of selectKategori.options) {
                opt.selected = opt.value === kategori;
            }

            document.getElementById('formEdit').action = '/update-ebook/' + id;
            toggleModal('modalEdit');
        }
    </script>

@endsection
