<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulir Buku Tamu</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="bg-[#f8fafc] min-h-screen flex flex-col justify-between p-6 relative">

    <div class="w-full max-w-5xl flex flex-col items-center mx-auto my-auto py-6">

        <div class="w-16 h-16 bg-[#1e5494] text-white rounded-full flex items-center justify-center shadow-md mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>
        </div>

        <h1 class="text-3xl font-bold text-[#0f172a] text-center mb-2">Buku Tamu Perpustakaan</h1>
        <p class="text-slate-500 text-center mb-8">Selamat datang! Pilih tujuan kunjungan Anda hari ini</p>

        <div class="bg-white w-full rounded-2xl shadow-sm border border-slate-100 overflow-hidden text-left">

            <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-bold text-slate-800">Verifikasi Identitas — Baca di Tempat</h2>
                    <p class="text-sm text-slate-400 mt-1">Foto diperlukan untuk keamanan koleksi perpustakaan</p>
                </div>
                <a href="{{ url('/buku-tamu') }}" class="text-slate-400 hover:text-slate-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
            </div>


            <form action="{{ url('/simpan-kunjungan') }}" method="POST" class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
                @csrf

                <div class="flex flex-col gap-4">
                    <h3 class="text-sm font-semibold text-slate-700">Verifikasi Wajah</h3>

                    <div class="relative w-full aspect-[4/3] bg-slate-100 rounded-xl overflow-hidden border border-slate-200 flex flex-col items-center justify-center">
                        <video id="webcam" autoplay playsinline class="w-full h-full object-cover"></video>
                        <canvas id="canvas" class="hidden"></canvas>

                        <div id="success-overlay" class="absolute inset-0 bg-[#e6f4ea]/95 flex flex-col items-center justify-center hidden">
                            <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-10 h-10">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            </div>
                            <p class="text-emerald-700 font-semibold text-lg">Foto Berhasil Diambil</p>
                        </div>
                    </div>

                    <input type="hidden" name="foto_wajah" id="foto_wajah_input" required>

                    <button type="button" id="snap-btn" onclick="ambilFoto()" class="w-full bg-white hover:bg-slate-50 text-slate-700 font-medium py-3 px-4 border border-slate-200 rounded-xl transition-all shadow-sm">
                        Ambil Foto
                    </button>
                    <button type="button" id="retake-btn" onclick="ambilUlang()" class="w-full bg-white hover:bg-slate-50 text-slate-700 font-medium py-3 px-4 border border-slate-200 rounded-xl transition-all shadow-sm hidden">
                        Ambil Ulang
                    </button>

                    <div class="bg-[#fef7ea] border border-[#fbe9cb] rounded-xl p-4 flex gap-3 text-sm text-[#b27210]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 flex-shrink-0 mt-0.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                        <p class="leading-relaxed">Foto digunakan untuk keamanan koleksi perpustakaan dan mencegah pencurian buku</p>
                    </div>
                </div>

                <div class="flex flex-col justify-between">
                    <div class="flex flex-col gap-5">
                        <h3 class="text-sm font-semibold text-slate-700">Data Pengunjung</h3>

                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-medium text-slate-700">Nama Lengkap *</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg> --}}
                                </span>
                                <input type="text" name="nama" required placeholder="Nama sesuai KTM/KTP" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 pl-11 pr-4 text-slate-700 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white transition-all text-sm">
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-medium text-slate-700">No Anggota / NPM *</label>
                            <input type="text" name="npm" required placeholder="Contoh: 2021001234" class="w-full bg-slate-50 border border-slate-200 rounded-xl py-3 px-4 text-slate-700 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:bg-white transition-all text-sm">
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-medium text-slate-700">Tujuan Kunjungan</label>
                            <div class="w-full bg-blue-50 border border-blue-100 text-[#1e5494] rounded-xl py-3 px-4 flex items-center gap-3 font-medium text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>
                                Baca di Tempat
                                <input type="hidden" name="tujuan" value="Baca di Tempat">
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-medium text-slate-700">Waktu Masuk</label>
                            <div class="w-full bg-slate-50 border border-slate-200 text-slate-500 rounded-xl py-3 px-4 flex items-center gap-3 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span>{{ \Carbon\Carbon::now()->translatedFormat('d M Y, H.i') }}</span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold p-5  rounded-xl transition-all shadow-sm text-center mt-6">
                        Konfirmasi & Masuk
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script type="text/javascript" src="https://unpkg.com/webcam-easy/dist/webcam-easy.min.js"></script>
    <script>
        const videoElement = document.getElementById('webcam');
        const canvasElement = document.getElementById('canvas');
        const snapButton = document.getElementById('snap-btn');
        const retakeButton = document.getElementById('retake-btn');
        const successOverlay = document.getElementById('success-overlay');
        const fotoInput = document.getElementById('foto_wajah_input');

        const webcam = new Webcam(videoElement, 'user', canvasElement);

        webcam.start()
            .then(result => console.log("Webcam Aktif"))
            .catch(err => console.log("Gagal memuat webcam"));

        function ambilFoto() {
            let picture = webcam.snap();
            fotoInput.value = picture;
            successOverlay.classList.remove('hidden');
            snapButton.classList.add('hidden');
            retakeButton.classList.remove('hidden');
        }

        function ambilUlang() {
            fotoInput.value = "";
            successOverlay.classList.add('hidden');
            snapButton.classList.remove('hidden');
            retakeButton.classList.add('hidden');
        }
    </script>
</body>
</html>
