@extends('layouts.index')
@section('halaman', 'Daftar Pengguna')
@section('main')
    <section class="mt-20 px-6">
        <form action="/daftar-pengguna" method="GET" class="flex items-center gap-2 mb-8">
            <input name="cari" type="text" placeholder="Cari..." class="bg-white w-full max-w-[450px] pl-4 py-3 rounded-md border border-gray-200" value="{{ request('cari') }}">
            <button type="submit" class="bg-[#35094D] text-white px-6 py-3 rounded-md">Cari</button>
            <a href="/daftar-pengguna/tambah-pengguna" class="bg-[#35094D] text-white px-6 py-3 rounded-md ml-auto">+ Tambah</a>
        </form>

        @php
            $kategori = [
                ['j' => 'Kepala Perpustakaan', 'data' => $admins, 'rel' => 'KepalaPerpus'],
                ['j' => 'Petugas', 'data' => $petugas, 'rel' => 'Petugas'],
                ['j' => 'Anggota', 'data' => $anggotas, 'rel' => 'Anggota']
            ];
        @endphp

        @foreach($kategori as $kat)
        <div class="mb-10">
            <h3 class="text-xl font-bold text-[#35094D] mb-4">{{ $kat['j'] }}</h3>
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                {{-- table-fixed membuat kolom rata --}}
                <table class="w-full table-fixed">
                    <thead class="bg-gray-50">
                        <tr class="text-left text-gray-500 text-sm">
                            <th class="p-4 w-[10%]">Profile</th>
                            <th class="p-4 w-[20%]">Username</th>
                            <th class="p-4 w-[30%]">Nama Lengkap</th>
                            <th class="p-4 w-[20%]">NIK/NPM</th>
                            <th class="p-4 w-[20%] text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-[#35094D]">
                        @forelse($kat['data'] as $user)
                            <tr class="border-t">
                                <td class="p-4"><img class="w-10 h-10 object-cover rounded-full" src="{{ $user->profile_photo ? asset('storage/'.$user->profile_photo) : asset('icons/default-avatar.png') }}"></td>
                                <td class="p-4 truncate">{{ $user->username }}</td>
                                <td class="p-4 truncate">{{ $user->{strtolower($kat['rel'])}->nama_lengkap ?? '-' }}</td>
                                <td class="p-4 truncate">{{ $user->{strtolower($kat['rel'])}->nomer_induk ?? '-' }}</td>
                                <td class="p-4 text-center">
                                    <a href="/daftar-pengguna/detail/pengguna_perpustakaan={{ $user->id }}" class="text-[#35094D] font-bold underline">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="p-4 text-center text-gray-400">Data tidak ditemukan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
    </section>
@endsection