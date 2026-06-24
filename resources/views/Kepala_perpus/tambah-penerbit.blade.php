@extends('layouts.index')

@section('halaman', 'Daftar Penerbit')
@section('suffix', 'Kelola data supplier dan penerbit buku perpustakaan')

@section('main')
    <section class="mt-20 px-6">

        {{-- Notifikasi Sukses --}}
        @if(session('sukses'))
            <div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl text-sm font-medium">
                {{ session('sukses') }}
            </div>
        @endif

        {{-- Header & Tombol Tambah --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-xl font-bold text-[#35094D]">Data Penerbit</h2>
                <p class="text-sm text-gray-400">Daftar supplier/penerbit buku perpustakaan</p>
            </div>
            <button onclick="toggleModal('modal-tambah')" class="bg-[#35094D] text-white px-5 py-2.5 rounded-xl font-medium hover:bg-[#250636] transition-colors flex items-center gap-2 text-sm shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Penerbit
            </button>
        </div>

        {{-- Grid Card --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            @forelse ($penerbits as $penerbit)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between min-h-[170px] relative">

                    <div class="flex items-start justify-between gap-2">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-[#35094d10] text-[#35094D] flex items-center justify-center rounded-xl flex-shrink-0">
                                <img src="https://api.iconify.design/ri:building-4-fill.svg?color=%2335094D" class="w-6 h-6 object-contain" alt="Penerbit">
                            </div>
                            <div class="min-w-0">
                                <h4 class="text-base font-bold text-[#35094D] truncate">{{ $penerbit->nama_penerbit }}</h4>
                                <p class="text-xs text-gray-400 font-medium mt-0.5">{{ $penerbit->alamat ?? 'N/A' }}</p>
                                <p class="text-xs text-gray-500 mt-2 truncate">{{ $penerbit->email ?? '-' }}</p>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex items-center gap-2">
                            {{-- Tombol Edit (Memanggil Fungsi JS dengan membawa data penorbit) --}}
                            <button onclick="bukaModalEdit({{ json_encode($penerbit) }})" class="text-blue-500 hover:text-blue-700 transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </button>

                            {{-- Tombol Hapus --}}
                            <form action="/daftar-penerbit/{{ $penerbit->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus penerbit ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="border-t border-gray-100 pt-4 mt-4 flex justify-between items-center text-xs">
                        <span class="text-gray-400">Jumlah Buku</span>
                        <span class="font-bold text-[#35094D] text-sm">
                            {{ $penerbit->bukus_count ?? 0 }} <span class="text-[10px] font-normal text-gray-400">judul</span>
                        </span>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-3 bg-white p-12 rounded-2xl text-center text-gray-400 border border-gray-100">
                    Tidak ada data penerbit yang ditemukan.
                </div>
            @endforelse
        </div>
    </section>

    {{-- MODAL TAMBAH DATA --}}
    <div id="modal-tambah" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-2xl p-8 w-full max-w-[450px] shadow-xl transform scale-95 transition-transform duration-300">
            <h3 class="text-lg font-bold text-[#35094D] mb-6">Tambah Penerbit Baru</h3>
            <form action="/daftar-penerbit" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-semibold text-gray-600 block mb-1">Nama Penerbit *</label>
                        <input type="text" name="nama_penerbit" required class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#35094D]">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 block mb-1">Alamat</label>
                        <input type="text" name="alamat" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#35094D]">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 block mb-1">Email</label>
                        <input type="email" name="email" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#35094D]">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 block mb-1">Telepon</label>
                        <input type="text" name="telepon" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#35094D]">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 block mb-1">Website</label>
                        <input type="text" name="website" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#35094D]">
                    </div>
                </div>
                <div class="flex justify-end gap-3 mt-8">
                    <button type="button" onclick="toggleModal('modal-tambah')" class="px-5 py-2.5 border border-gray-200 rounded-lg text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors">Batal</button>
                    <button type="submit" class="px-5 py-2.5 bg-[#35094D] text-white rounded-lg text-sm font-medium transition-colors shadow-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- MODAL EDIT DATA --}}
    <div id="modal-edit" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-2xl p-8 w-full max-w-[450px] shadow-xl transform scale-95 transition-transform duration-300">
            <h3 class="text-lg font-bold text-[#35094D] mb-6">Ubah Data Penerbit</h3>
            <form id="form-edit" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-semibold text-gray-600 block mb-1">Nama Penerbit *</label>
                        <input type="text" id="edit-nama" name="nama_penerbit" required class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#35094D]">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 block mb-1">Alamat</label>
                        <input type="text" id="edit-alamat" name="alamat" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#35094D]">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 block mb-1">Email</label>
                        <input type="email" id="edit-email" name="email" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#35094D]">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 block mb-1">Telepon</label>
                        <input type="text" id="edit-telepon" name="telepon" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#35094D]">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600 block mb-1">Website</label>
                        <input type="text" id="edit-website" name="website" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-[#35094D]">
                    </div>
                </div>
                <div class="flex justify-end gap-3 mt-8">
                    <button type="button" onclick="toggleModal('modal-edit')" class="px-5 py-2.5 border border-gray-200 rounded-lg text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors">Batal</button>
                    <button type="submit" class="px-5 py-2.5 bg-[#35094D] text-white rounded-lg text-sm font-medium transition-colors shadow-sm">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Script JavaScript Modal Logic --}}
    <script>
        function toggleModal(id) {
            const modal = document.getElementById(id);
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modal.querySelector('div').classList.remove('scale-95');
                }, 20);
            } else {
                modal.classList.add('opacity-0');
                modal.querySelector('div').classList.add('scale-95');
                setTimeout(() => modal.classList.add('hidden'), 300);
            }
        }

        // Fungsi khusus menyuntikkan data lama penerbit ke form Edit sebelum dibuka
        function bukaModalEdit(penerbit) {
            document.getElementById('form-edit').action = '/daftar-penerbit/' + penerbit.id;
            document.getElementById('edit-nama').value = penerbit.nama_penerbit;
            document.getElementById('edit-alamat').value = penerbit.alamat || '';
            document.getElementById('edit-email').value = penerbit.email || '';
            document.getElementById('edit-telepon').value = penerbit.telepon || '';
            document.getElementById('edit-website').value = penerbit.website || '';
            toggleModal('modal-edit');
        }
    </script>
@endsection
