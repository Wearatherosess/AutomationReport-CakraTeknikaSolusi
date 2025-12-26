<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Laporan K3</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    {{-- HEADER --}}
    <div class="bg-slate-800 text-white px-8 py-6 shadow">
        <h1 class="text-2xl font-semibold">
            Sistem Otomasi Laporan K3
        </h1>
        <p class="text-sm text-slate-300">
            Pilih bagian laporan untuk memulai pengisian data
        </p>
    </div>

    {{-- CONTENT --}}
    <div class="max-w-6xl mx-auto px-6 py-10">

        <h2 class="text-xl font-semibold text-gray-700 mb-6">
            Menu Bagian Laporan
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- Listrik --}}
            <a href="{{ url('/laporan/listrik') }}"
               class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 border-l-4 border-yellow-500">
                <h3 class="text-lg font-semibold text-gray-800">
                    Listrik
                </h3>
                <p class="text-sm text-gray-500 mt-2">
                    Instalasi listrik dan sistem penyalur petir
                </p>
            </a>

            {{-- Pesawat Angkat & Angkut --}}
            <a href="{{ url('/laporan/pesawat-angkat-angkut') }}"
               class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 border-l-4 border-blue-500">
                <h3 class="text-lg font-semibold text-gray-800">
                    Pesawat Angkat dan Angkut
                </h3>
                <p class="text-sm text-gray-500 mt-2">
                    Excavator, forklift, crane, conveyor, dan sejenisnya
                </p>
            </a>

            {{-- Pesawat Tenaga Produksi --}}
            <a href="{{ url('/laporan/pesawat-tenaga-produksi') }}"
               class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 border-l-4 border-green-600">
                <h3 class="text-lg font-semibold text-gray-800">
                    Pesawat Tenaga Produksi
                </h3>
                <p class="text-sm text-gray-500 mt-2">
                    Mesin produksi dan penggerak mula
                </p>
            </a>

            {{-- Pesawat Uap & Bejana Tekan --}}
            <a href="{{ url('/laporan/pesawat-uap-bejana-tekan') }}"
               class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 border-l-4 border-red-500">
                <h3 class="text-lg font-semibold text-gray-800">
                    Pesawat Uap & Bejana Tekan
                </h3>
                <p class="text-sm text-gray-500 mt-2">
                    Boiler, air compressor, air receiver tank
                </p>
            </a>

            {{-- Proteksi Kebakaran --}}
            <a href="{{ url('/laporan/proteksi-kebakaran') }}"
               class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 border-l-4 border-orange-500">
                <h3 class="text-lg font-semibold text-gray-800">
                    Proteksi Kebakaran
                </h3>
                <p class="text-sm text-gray-500 mt-2">
                    APAR, hydrant, fire alarm, sprinkler
                </p>
            </a>

        </div>
    </div>

    {{-- FOOTER --}}
    <div class="bg-gray-200 text-center py-4 text-sm text-gray-600">
        © {{ date('Y') }} Sistem Otomasi Laporan K3 – Magang
    </div>

</body>
</html>
