<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sub Bagian Laporan</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

    {{-- HEADER --}}
    <div class="bg-slate-800 text-white px-8 py-6 shadow">
        <h1 class="text-2xl font-semibold">
            {{ strtoupper(str_replace('-', ' ', $bagian)) }}
        </h1>
        <p class="text-sm text-slate-300">
            Pilih sub bagian untuk mengisi laporan
        </p>
    </div>

    {{-- BREADCRUMB --}}
    <div class="max-w-6xl mx-auto px-6 pt-4 text-sm text-gray-600">
        <a href="{{ url('/laporan') }}" class="hover:underline">
            Menu Laporan
        </a>
        <span class="mx-2">›</span>
        <span class="font-semibold">
            {{ strtoupper(str_replace('-', ' ', $bagian)) }}
        </span>
    </div>

    {{-- CONTENT --}}
    <div class="max-w-6xl mx-auto px-6 py-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse ($subBagian as $key => $label)
                <a href="{{ url('/laporan/'.$bagian.'/'.$key.'/create') }}"
                   class="bg-white rounded-lg shadow hover:shadow-lg transition p-6 border-l-4 border-indigo-600">

                    <h3 class="text-lg font-semibold text-gray-800">
                        {{ $label }}
                    </h3>

                    <p class="text-sm text-gray-500 mt-2">
                        Input laporan untuk {{ strtolower($label) }}
                    </p>

                    <div class="mt-4 text-indigo-600 text-sm font-semibold">
                        Mulai Input →
                    </div>
                </a>
            @empty
                <div class="col-span-3 text-center text-gray-500">
                    Sub bagian belum tersedia
                </div>
            @endforelse

        </div>
    </div>

    {{-- FOOTER --}}
    <div class="bg-gray-200 text-center py-4 text-sm text-gray-600">
        © {{ date('Y') }} Sistem Otomasi Laporan K3 – Magang
    </div>

</body>
</html>
