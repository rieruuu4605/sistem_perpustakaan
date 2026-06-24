@extends('layouts.index')

@section('halaman', 'Log Download E-Book')
@section('suffix', 'Perpustakaan!')

@section('main')
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 my-16">
        <div class="bg-[#35094D] p-6 rounded-[32px] shadow-sm">
            <div class="flex flex-col gap-4">
                <span class="text-[20px] text-[#FFFFFF] leading-snug">Total Download <br> E-Book</span>
                <span class="text-5xl font-bold text-blue-600">{{ $TotalDownload }}</span>
                <span class="text-[#FFFFFF90] text-[10px]">
                    *Akumulasi seluruh unduhan <br> yang tercatat di sistem
                </span>
            </div>
        </div>

        <div class="bg-[#F99D22] p-6 rounded-[32px] shadow-sm">
            <div class="flex flex-col gap-4">
                <span class="text-[20px] text-[#FFFFFF] leading-snug">Pengguna Unik <br> (Unduh)</span>
                <span class="text-5xl font-bold text-green-600">{{ $PenggunaUnik }}</span>
                <span class="text-[#FFFFFF90] text-[10px]">
                    *Jumlah anggota berbeda <br> yang mengunduh e-book
                </span>
            </div>
        </div>

        <div class="bg-[#0B4B88] p-6 rounded-[32px] shadow-sm">
            <div class="flex flex-col gap-4">
                <span class="text-[20px] text-[#FFFFFF] leading-snug">Unduhan <br> Hari Ini</span>
                <span class="text-5xl font-bold text-amber-500">{{ $HariIni }}</span>
                <span class="text-[#FFFFFF90] text-[10px]">
                    *Total dokumen e-book <br> yang diunduh hari ini
                </span>
            </div>
        </div>
    </section>

    <section class="mb-20">
        <div class="flex justify-between items-center mb-4">
            <span class="text-[20px] font-semibold text-[#35094D]">
                Daftar Aktivitas Unduhan Anggota
            </span>
        </div>

        <div class="bg-white w-full rounded-2xl p-6 shadow-sm border border-gray-100 overflow-hidden">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="text-left border-b border-gray-100 text-sm">
                        <th class="pb-4 text-gray-400 font-semibold uppercase tracking-wider w-12 text-center">No</th>
                        <th class="pb-4 text-gray-400 font-semibold uppercase tracking-wider pl-4">Nama User</th>
                        <th class="pb-4 text-gray-400 font-semibold uppercase tracking-wider">NPM / NIDN</th>
                        <th class="pb-4 text-gray-400 font-semibold uppercase tracking-wider">Jenis</th>
                        <th class="pb-4 text-gray-400 font-semibold uppercase tracking-wider">Judul E-Book</th>
                        <th class="pb-4 text-gray-400 font-semibold uppercase tracking-wider">Tanggal</th>
                        <th class="pb-4 text-gray-400 font-semibold uppercase tracking-wider">Waktu</th>
                        <th class="pb-4 text-gray-400 font-semibold uppercase tracking-wider text-right pr-4">Ukuran</th>
                    </tr>
                </thead>
                <tbody class="text-[#35094D] text-[15px]">
                    @forelse ($LogEbooks as $index => $log)
                        <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 text-center text-gray-400 font-medium">
                               {{ $LogEbooks->firstItem() + $index }}
                            <td class="py-4 font-bold pl-4">{{ $log->user->name ?? 'User Terhapus' }}</td>
                            <td class="py-4 text-gray-500 font-medium">{{ $log->user->npm ?? '-' }}</td>
                            <td class="py-4">
                                @if(strtolower($log->user->role ?? '') === 'mahasiswa')
                                    <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-lg text-xs font-semibold border border-blue-100">
                                        Mahasiswa
                                    </span>
                                @else
                                    <span class="bg-purple-50 text-purple-600 px-3 py-1 rounded-lg text-xs font-semibold border border-purple-100">
                                        Dosen
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 font-medium">{{ $log->ebook->judul_ebook ?? 'E-Book Terhapus' }}</td>
                            <td class="py-4 text-gray-500">{{ $log->created_at->format('Y-m-d') }}</td>
                            <td class="py-4 text-gray-500 font-mono text-sm">{{ $log->created_at->format('H:i') }}</td>
                            <td class="py-4 text-right pr-4 font-semibold text-gray-600">{{ $log->ebook->ukuran_file ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-12 text-gray-400 italic bg-gray-50/50 rounded-xl">
                                Belum ada aktivitas unduhan e-book yang tercatat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if($LogEbooks instanceof \Illuminate\Pagination\LengthAwarePaginator)
                <div class="mt-6">
                    {{ $LogEbooks->links() }}
                </div>
            @endif
        </div>
    </section>
@endsection
