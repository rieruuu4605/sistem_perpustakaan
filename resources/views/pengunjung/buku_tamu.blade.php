<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buku Tamu Perpustakaan</title>
    @vite('resources/css/app.css')
    <style>
        .login_img_section {
            background: linear-gradient(rgba(1, 1, 1, .5), rgba(0, 0, 0, .5)), url('/images/bg-masuk.png');
            background-size: cover;
            background-position: center;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-[#f8fafc] min-h-screen flex flex-col justify-between p-6 relative">

    <div class="w-full max-w-4xl flex flex-col items-center mx-auto my-auto py-12">

        <div class="w-16 h-16 bg-[#1e5494] text-white rounded-full flex items-center justify-center shadow-md mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>
        </div>

        @if(session('success'))
                <div style="background-color: #d1e7dd; color: #0f5132; border: 1px solid #badbcc; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-family: sans-serif;">
                    <span style="font-weight: bold;">✓ Sukses!</span> {{ session('success') }}
                </div>
        @endif

        <h1 class="text-3xl font-bold text-[#0f172a] text-center mb-2">Buku Tamu Perpustakaan</h1>
        <p class="text-slate-500 text-center mb-12">Selamat datang! Pilih tujuan kunjungan Anda hari ini</p>

        <div class="w-full max-w-md">

            <a href="{{ url('/form-buku-tamu') }}" class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-all duration-300 flex flex-col items-start group text-left w-full">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mb-6 group-hover:bg-emerald-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75Zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm-.375 0h.008v.015h-.008V9.75ZM12 12h.008v.008H12V12Zm0 2.25h.008v.008H12v-.008ZM9.75 14.25h.008v.008H9.75v-.008Zm5.625 0h.008v.008h-.008v-.008ZM4.5 9h16.5m-16.5 5.25h16.5c1.035 0 1.875-.84 1.875-1.875v-.75A1.875 1.875 0 0 0 21 9.75h-1.5V6.75A2.25 2.25 0 0 0 17.25 4.5H6.75A2.25 2.25 0 0 0 4.5 6.75v3m16.5 4.5A2.25 2.25 0 0 1 18.75 16.5H5.25A2.25 2.25 0 0 1 3 14.25M18.75 16.5V18a2.25 2.25 0 0 1-2.25 2.25H7.5A2.25 2.25 0 0 1 5.25 18v-1.5" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-slate-800 mb-2">Baca di Tempat</h2>
                <p class="text-slate-500 text-sm leading-relaxed">Baca buku di ruang baca perpustakaan tanpa perlu meminjam</p>
            </a>

        </div>

        <div class="mt-16">
            <a href="/login" class="text-slate-500 font-medium hover:text-slate-800 underline underline-offset-4 transition-colors text-sm">
                Saya sudah terdaftar, langsung login
            </a>
        </div>
    </div>

    <div class="fixed bottom-6 right-6 z-50">
        <button class="w-10 h-10 bg-white text-slate-400 rounded-full flex items-center justify-center shadow-sm border border-slate-200 hover:bg-slate-50 hover:text-slate-600 transition-all font-medium text-lg">
            ?
        </button>
    </div>

</body>

</html>
