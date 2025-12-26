<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Input Laporan</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

{{-- HEADER --}}
<div class="bg-slate-800 text-white px-8 py-6 shadow">
    <h1 class="text-2xl font-semibold">Form Input Laporan</h1>
    <p class="text-sm text-slate-300">
        {{ strtoupper(str_replace('-', ' ', $bagian)) }} —
        {{ strtoupper(str_replace('-', ' ', $sub)) }}
    </p>
</div>

{{-- BREADCRUMB --}}
<div class="max-w-6xl mx-auto px-6 pt-4 text-sm text-gray-600">
    <a href="{{ url('/laporan') }}" class="hover:underline">Menu Laporan</a>
    <span class="mx-2">›</span>
    <a href="{{ url('/laporan/'.$bagian) }}" class="hover:underline">
        {{ strtoupper(str_replace('-', ' ', $bagian)) }}
    </a>
    <span class="mx-2">›</span>
    <span class="font-semibold">
        {{ strtoupper(str_replace('-', ' ', $sub)) }}
    </span>
</div>

{{-- CONTENT --}}
<div class="max-w-6xl mx-auto px-6 py-8">

<form method="POST"
      action="{{ url('/laporan/'.$bagian.'/'.$sub.'/store') }}"
      class="bg-white shadow rounded-lg p-8 space-y-8">

    @csrf

    {{-- ================= DATA UMUM LAPORAN ================= --}}
    <div>
        <h2 class="text-lg font-semibold text-gray-700 mb-4">
            Data Umum Laporan
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Nama Perusahaan
                </label>
                <input
                    type="text"
                    name="nama_perusahaan"
                    value="{{ old('nama_perusahaan') }}"
                    required
                    class="mt-1 block w-full border rounded px-3 py-2"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Lokasi
                </label>
                <input
                    type="text"
                    name="lokasi"
                    value="{{ old('lokasi') }}"
                    required
                    class="mt-1 block w-full border rounded px-3 py-2"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Tanggal Pemeriksaan
                </label>
                <input
                    type="date"
                    name="tanggal_pemeriksaan"
                    value="{{ old('tanggal_pemeriksaan') }}"
                    required
                    class="mt-1 block w-full border rounded px-3 py-2"
                >
            </div>
        </div>
    </div>

    {{-- ================= DATA TEKNIS MESIN ================= --}}
    <div>
        <h2 class="text-lg font-semibold text-gray-700 mb-4">
            Data Teknis Mesin
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Jenis Mesin
                </label>
                <input
                    type="text"
                    name="jenis_mesin"
                    value="{{ old('jenis_mesin') }}"
                    class="mt-1 block w-full border rounded px-3 py-2"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Merek
                </label>
                <input
                    type="text"
                    name="merek"
                    value="{{ old('merek') }}"
                    class="mt-1 block w-full border rounded px-3 py-2"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Tahun Pembuatan
                </label>
                <input
                    type="number"
                    name="tahun_pembuatan"
                    value="{{ old('tahun_pembuatan') }}"
                    class="mt-1 block w-full border rounded px-3 py-2"
                >
            </div>
        </div>
    </div>

    {{-- ================= SUBMIT ================= --}}
    <div class="flex justify-end gap-4">
        <a href="{{ url('/laporan/'.$bagian) }}"
           class="px-4 py-2 border rounded text-gray-600 hover:bg-gray-100">
            Batal
        </a>

        <button type="submit"
                class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
            Simpan & Lanjut Pemeriksaan →
        </button>
    </div>

</form>
</div>

{{-- FOOTER --}}
<div class="bg-gray-200 text-center py-4 text-sm text-gray-600">
    © {{ date('Y') }} Sistem Otomasi Laporan K3 – Magang
</div>

</body>
</html>
