@extends('layouts.index')
@section('halaman', 'Kelola Meja')
@section('main')


<section class="mt-10">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-[#35094D]">Denah Meja Baca</h1>
        <p class="text-sm text-gray-400 mt-1">Perbarui status bangku setiap keliling (±20 menit sekali)</p>
    </div>

    {{-- Legend --}}
    <div class="flex items-center gap-6 mb-8">
        <div class="flex items-center gap-2">
            <div class="w-4 h-4 rounded bg-[#16C098]/30 border border-[#16C098]"></div>
            <span class="text-sm text-gray-500">Kosong</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-4 h-4 rounded bg-red-100 border border-red-300"></div>
            <span class="text-sm text-gray-500">Terisi</span>
        </div>
    </div>

    {{-- Grid Meja --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($mejas as $kodeMeja => $bangkus)
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">

                {{-- Header Meja --}}
                <div class="flex items-center justify-between mb-5">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#35094D] rounded-xl flex items-center justify-center">
                            <span class="text-white font-bold text-sm">{{ $kodeMeja }}</span>
                        </div>
                        <div>
                            <p class="font-bold text-[#35094D]">Meja {{ substr($kodeMeja, 1) }}</p>
                            <p class="text-xs text-gray-400">
                                {{ $bangkus->where('status', 'terisi')->count() }}/4 terisi
                            </p>
                        </div>
                    </div>
                    {{-- Indikator semua kosong / semua terisi --}}
                    @if ($bangkus->where('status', 'kosong')->count() === 4)
                        <span class="text-xs bg-[#16C098]/20 text-[#008767] font-semibold px-3 py-1 rounded-full">Semua Kosong</span>
                    @elseif ($bangkus->where('status', 'terisi')->count() === 4)
                        <span class="text-xs bg-red-100 text-red-500 font-semibold px-3 py-1 rounded-full">Penuh</span>
                    @else
                        <span class="text-xs bg-yellow-100 text-yellow-600 font-semibold px-3 py-1 rounded-full">Sebagian</span>
                    @endif
                </div>

                {{-- Grid 4 Bangku (2x2) --}}
                <div class="grid grid-cols-2 gap-3">
                    @foreach ($bangkus as $bangku)
                        <div class="rounded-xl border-2 p-3 transition-all
                            {{ $bangku->status === 'terisi'
                                ? 'bg-red-50 border-red-200'
                                : 'bg-[#16C098]/10 border-[#16C098]/30' }}">

                            {{-- Label Bangku --}}
                            <div class="flex items-center justify-between mb-3">
                                <span class="font-bold text-sm text-[#35094D]">
                                    {{ $kodeMeja }}-{{ $bangku->nomor_bangku }}
                                </span>
                                <span class="text-xs font-semibold px-2 py-0.5 rounded-full
                                    {{ $bangku->status === 'terisi'
                                        ? 'bg-red-100 text-red-500'
                                        : 'bg-[#16C098]/20 text-[#008767]' }}">
                                    {{ $bangku->status === 'terisi' ? 'Terisi' : 'Kosong' }}
                                </span>
                            </div>

                            {{-- Timestamp --}}
                            <p class="text-[10px] text-gray-400 mb-3">
                                @if ($bangku->terakhir_diperbarui)
                                    {{ $bangku->terakhir_diperbarui->diffForHumans() }}
                                @else
                                    Belum pernah dicatat
                                @endif
                            </p>

                            {{-- Tombol Toggle --}}
                            <form action="/update-meja/{{ $bangku->id }}" method="POST">
                                @csrf
                                @if ($bangku->status === 'kosong')
                                    <input type="hidden" name="status" value="terisi">
                                    <button type="submit"
                                        class="w-full text-xs font-semibold py-1.5 rounded-lg bg-red-100 text-red-500 hover:bg-red-200 transition-colors cursor-pointer">
                                        Tandai Terisi
                                    </button>
                                @else
                                    <input type="hidden" name="status" value="kosong">
                                    <button type="submit"
                                        class="w-full text-xs font-semibold py-1.5 rounded-lg bg-[#16C098]/20 text-[#008767] hover:bg-[#16C098]/40 transition-colors cursor-pointer">
                                        Tandai Kosong
                                    </button>
                                @endif
                            </form>

                        </div>
                    @endforeach
                </div>

                {{-- Footer: petugas terakhir update --}}
                @if ($bangkus->whereNotNull('petugas_id')->isNotEmpty())
                    <p class="text-[11px] text-gray-300 mt-4 text-right">
                        Dicatat oleh: {{ $bangkus->whereNotNull('petugas_id')->last()->petugas->username ?? '-' }}
                    </p>
                @endif

            </div>
        @endforeach
    </div>
</section>

@endsection