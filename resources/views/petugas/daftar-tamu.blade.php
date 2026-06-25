@extends('layouts.index')

@section('halaman', 'Daftar Tamu')

@section('main')

    {{-- Filter --}}
    <section class="mt-20 flex justify-between items-center">
        <div>
            {{-- kosong kiri --}}
        </div>
        <form action="/petugas/daftar-tamu" method="GET" class="flex items-center gap-2">
            <input type="date" name="tanggal" value="{{ $tanggal }}"
                class="bg-white px-4 py-3 rounded-md border border-gray-200 text-gray-500">
            <button type="submit"
                class="bg-[#35094D] text-white px-6 py-3 rounded-md hover:bg-[#2a073a] transition duration-300 cursor-pointer">Filter</button>
        </form>
    </section>

    <section>
        <div class="bg-white w-full rounded-xl mt-4 p-6">
            <div class="mb-10">
                <h2 class="text-2xl text-gray-500 font-medium">Daftar Tamu Perpustakaan</h2>
                <p class="text-sm text-gray-400">Menampilkan tamu yang mengisi buku tamu pada tanggal
                    <span class="font-medium text-[#35094D]">{{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</span>.
                </p>
            </div>
            <table class="w-full">
                <thead>
                    <tr class="text-left border-b border-gray-200">
                        <th class="pb-4 text-center text-gray-400 font-normal">No</th>
                        <th class="pb-4 text-center text-gray-400 font-normal">Foto</th>
                        <th class="pb-4 text-center text-gray-400 font-normal">Nama</th>
                        <th class="pb-4 text-center text-gray-400 font-normal">NPM / No. Anggota</th>
                        <th class="pb-4 text-center text-gray-400 font-normal">Tujuan</th>
                        <th class="pb-4 text-center text-gray-400 font-normal">Jam Masuk</th>
                    </tr>
                </thead>
                <tbody class="text-[#35094D]">
                    @forelse ($pengunjung as $index => $tamu)
                        <tr class="border-b border-gray-200">
                            <td class="py-4 text-center">{{ $index + 1 }}</td>
                            <td class="py-4 text-center">
                                @if($tamu->foto_wajah)
                                    <img src="{{ $tamu->foto_wajah }}" alt="Foto {{ $tamu->nama }}"
                                        class="w-10 h-10 rounded-full object-cover mx-auto border border-gray-200">
                                @else
                                    <img src="{{ asset('icons/default-avatar.png') }}" alt="No foto"
                                        class="w-10 h-10 rounded-full object-cover mx-auto border border-gray-200">
                                @endif
                            </td>
                            <td class="py-4 text-center">{{ $tamu->nama }}</td>
                            <td class="py-4 text-center">{{ $tamu->npm }}</td>
                            <td class="py-4 text-center">{{ $tamu->tujuan }}</td>
                            <td class="py-4 text-center">{{ \Carbon\Carbon::parse($tamu->created_at)->format('H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-10 text-gray-400">
                                Tidak ada tamu yang tercatat pada tanggal ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

@endsection