<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Monitoring</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="flex flex-row h-screen">
    <!-- Sidebar -->
    <aside class="bg-white border-2 text-orange-500 flex flex-col items-center py-12 px-5 w-64 h-full">
        <div class="flex flex-col items-center justify-center mb-10">
            <img src="{{ asset('images/bps.png') }}" alt="BPS Sumbawa" class="w-16 sm:w-24 mb-5 lg:mb-10">
            <h2 class="text-center text-lg sm:text-xl text-black font-bold">
                Badan Pusat Statistik <br> Kabupaten Sumbawa
            </h2>
        </div>

        <nav class="w-full">
            <ul class="text-center space-y-2">
                <li class="py-2 lg:py-4 cursor-pointer bg-orange-500 text-white rounded-lg"><a
                        href="{{ route('anggota.dashboard') }}" class="block">Dashboard</a></li>
                <li class="py-2 lg:py-4 cursor-pointer hover:bg-orange-300 transition rounded-lg">
                    <a href="{{ route('anggotadaftarkegiatan.daftarKegiatan') }}" class="block">Daftar Kegiatan</a>
                </li>
                <li class="py-2 lg:py-4 cursor-pointer hover:bg-orange-300 transition rounded-lg">Jadwal Kegiatan</li>
            </ul>
        </nav>
        <a href="{{ route('logout') }}" class="mt-auto py-2 px-14 bg-red-600 text-white rounded-lg">Log Out</a>

    </aside>

    <!-- Konten Utama -->
    <div class="flex flex-col flex-grow h-full">
        <header
            class="flex justify-between items-center bg-gradient-to-r from-yellow-400 to-orange-400 px-5 py-2 h-16 text-white">
            <h1 class="text-2xl font-bold">Sistem Monitoring</h1>
            <div class="flex items-center gap-3">
                <span>Anggota</span>
                <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                <div class="relative">
                    <i class="fa fa-bell"></i>
                    <span class="absolute top-0 right-0 bg-red-600 text-xs text-white rounded-full px-2">3</span>
                </div>
            </div>
        </header>

        <main class="flex-grow p-6 overflow-y-auto">

        </main>

        <footer class="bg-gradient-to-r from-yellow-400 to-orange-400 text-white px-6 py-4">
            <div class="text-sm sm:text-lg font-medium">
                © 2024 <span class="text-green-500">Tim Pengolahan dan TI</span> Badan Pusat Statistik
            </div>
        </footer>
    </div>

</body>

</html>
