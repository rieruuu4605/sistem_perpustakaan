@extends('layouts.index')

@section('halaman', 'E-Book')

@section('main')

    <section class="px-10 pt-10">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-[#35094D]">E-Book</h1>
            <p class="text-sm text-gray-500 mt-1">Unduh e-book — akses kapan saja dan di mana saja (download tercatat di sistem)</p>
        </div>

        <div class="flex items-start gap-3 bg-[#35094D]/10 border border-[#35094D]/20 text-[#35094D] p-4 rounded-xl text-sm max-w-[1200px]">
            <div class="w-5 h-5 flex items-center justify-center mt-0.5 shrink-0">
                <img src="https://api.iconify.design/ri:information-fill.svg?color=%2335094D" class="w-5 h-5" alt="Info">
            </div>
            <p>Setiap download e-book tercatat atas nama akun login Anda. Maks kapasitas file e-book: 50 MB.</p>
        </div>
    </section>

    <section class="px-10 mt-8">
        <form action="/e-book" method="GET" class="form-cari flex flex-col gap-4">
            @csrf
            <div class="relative w-full max-w-[600px]">
                <div class="absolute inset-y-0 left-4 flex items-center">
                    <img src="{{ asset('icons/svg/Search.svg') }}" class="w-5 opacity-50" alt="">
                </div>
                <input name="cari" type="text" value="{{ request('cari') }}" placeholder="Cari e-book..."
                    class="bg-white w-full pl-12 pr-4 py-4 rounded-2xl outline-0 border border-gray-100 shadow-sm focus:border-[#35094D]/50" value="{{ request('cari') }}">
            </div>
        </form>
    </section>

    <section class="w-full px-10 mt-8 pb-20 min-h-[500px]">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-[1200px]">

            @forelse ($Ebooks as $ebook)
                <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between gap-6 hover:shadow-md transition-shadow">

                    <div class="flex items-start gap-4">
                        <div class="w-14 h-16 bg-[#35094D] text-white rounded-xl flex flex-col items-center justify-center shrink-0">
                            <img src="https://api.iconify.design/ri:book-open-fill.svg?color=%23ffffff" class="w-6 h-6" alt="PDF">
                            <span class="text-[10px] font-bold tracking-wider mt-0.5">PDF</span>
                        </div>

                        <div class="flex flex-col">
                            <h3 class="font-bold text-[16px] text-[#35094D] line-clamp-1">
                                {{ $ebook->judul_ebook ?? 'Tidak Ada Judul.' }}
                            </h3>
                            <span class="text-sm text-gray-500 mt-0.5">
                                {{ $ebook->penulis ?? 'Anonim' }}
                            </span>
                            <span class="text-xs text-gray-400">
                                {{ $ebook->tahun_terbit ?? '-' }}
                            </span>

                            <div class="mt-3">
                                <span class="bg-[#35094D]/10 text-[#35094D] text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ $ebook->kategori ?? 'Umum' }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between border-t border-gray-50 pt-4 mt-auto">
                        <span class="text-xs text-gray-400">
                            {{ number_format($ebook->total_download ?? 0) }} downloads
                        </span>

                        <div class="flex items-center gap-4">
                            <span class="text-xs font-medium text-gray-400">
                                {{ $ebook->ukuran_file ?? '0.0 MB' }}
                            </span>
                            <a href="{{ route('ebook.download', $ebook->id) }}"
                                class="block w-full text-center bg-[#35094D] text-white text-sm font-semibold py-2.5 rounded-xl hover:bg-[#35094D]/90 transition-all shadow-sm flex items-center justify-center gap-2">
                                    <img src="https://api.iconify.design/ri:download-cloud-2-fill.svg?color=%23ffffff" class="w-4 h-4" alt="">
                                    Unduh PDF
                            </a>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-full text-center py-20 bg-white rounded-2xl border border-gray-100">
                    <p class="text-gray-400 italic">E-Book tidak ditemukan...</p>
                </div>
            @endforelse

        </div>

        <div class="mt-8">
            {{ $Ebooks->links() }}
        </div>
    </section>

@endsection
