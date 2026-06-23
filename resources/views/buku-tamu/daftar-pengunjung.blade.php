@extends('layouts.index')

@section('halaman', 'Daftar Pengunjung')

@section('main')
<section class="mt-20">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-[#35094D]">Daftar Pengunjung Hari Ini</h2>
        <span class="text-gray-500">{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</span>
    </div>

    <div class="bg-white w-full rounded-xl mt-4 p-6 shadow-sm">
        <table class="w-full">
            <thead>
                <tr class="text-left border-b border-gray-200">
                    <th class="pb-4 text-center text-gray-400 font-normal">Nama</th>
                    <th class="pb-4 text-center text-gray-400 font-normal">NIK / NPM</th>
                    <th class="pb-4 text-center text-gray-400 font-normal">Tujuan</th>
                    <th class="pb-4 text-center text-gray-400 font-normal">Waktu Masuk</th>
                    <th class="pb-4 text-center text-gray-400 font-normal">Foto</th>
                </tr>
            </thead>
            <tbody class="text-[#35094D]">
                @forelse ($pengunjung as $tamu)
                <tr class="border-b border-gray-200">
                    <td class="py-4 text-center">{{ $tamu->nama }}</td>
                    <td class="py-4 text-center">{{ $tamu->npm }}</td>
                    <td class="py-4 text-center">{{ $tamu->tujuan }}</td>
                    <td class="py-4 text-center">{{ $tamu->created_at->format('H:i') }}</td>
                    <td class="py-4 flex justify-center">
                        <img src="{{ $tamu->foto_wajah }}" class="w-16 h-12 object-cover rounded shadow-sm border" alt="Foto">
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-10 text-gray-400 italic">Belum ada pengunjung hari ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection