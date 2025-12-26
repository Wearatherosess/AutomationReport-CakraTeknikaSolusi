<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Mesin Produksi</title>

    <style>
        @page {
            size: A4;
            margin: 20mm;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 12px;
            line-height: 1.5;
            margin: 0;
            color: #000;
        }

        .header {
            display: table;
            width: 100%;
            margin-bottom: 10px;
        }

        .header-logo {
            display: table-cell;
            width: 90px;
            vertical-align: middle;
        }

        .header-logo img {
            width: 80px;
        }

        .header-text {
            display: table-cell;
            text-align: center;
            vertical-align: middle;
        }

        .header-text h3 {
            margin: 0;
            font-size: 14px;
            font-weight: bold;
        }

        .header-text p {
            margin: 2px 0;
            font-size: 11px;
        }

        hr {
            border: 1px solid black;
            margin: 10px 0 15px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 12px;
        }

        th, td {
            border: 1px solid black;
            padding: 6px;
            vertical-align: top;
        }

        .no-border td {
            border: none;
            padding: 4px;
        }

        .text-center {
            text-align: center;
        }

        .section-title {
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        .ttd {
            margin-top: 40px;
            width: 100%;
        }

        .ttd td {
            border: none;
            text-align: center;
            padding-top: 60px;
        }
    </style>
</head>
<body>

<div class="page">

    {{-- HEADER --}}
    <div class="header">
        <div class="header-logo">
            <img src="{{ public_path('assets/logo-instansi.png') }}">
        </div>
        <div class="header-text">
            <h3>LAPORAN PEMERIKSAAN DAN PENGUJIAN</h3>
            <h3>PESAWAT TENAGA PRODUKSI</h3>
            <h3>MESIN PRODUKSI</h3>
            <p>Nomor: {{ $laporan->id }}/LAP-K3/{{ date('Y') }}</p>
        </div>
    </div>

    <hr>

    {{-- I. IDENTITAS PERUSAHAAN --}}
    <div class="section-title">I. IDENTITAS PERUSAHAAN</div>
    <table class="no-border">
        <tr>
            <td width="30%">Nama Perusahaan</td>
            <td width="5%">:</td>
            <td>{{ $laporan->nama_perusahaan }}</td>
        </tr>
        <tr>
            <td>Lokasi</td>
            <td>:</td>
            <td>{{ $laporan->lokasi }}</td>
        </tr>
        <tr>
            <td>Tanggal Pemeriksaan</td>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($laporan->tanggal_pemeriksaan)->format('d F Y') }}</td>
        </tr>
    </table>

    {{-- II. DATA TEKNIS MESIN --}}
    <div class="section-title">II. DATA TEKNIS MESIN</div>
    <table>
        <tr>
            <td width="40%">Jenis Mesin</td>
            <td>{{ $laporan->dataUmum->jenis_mesin ?? '-' }}</td>
        </tr>
        <tr>
            <td>Merek</td>
            <td>{{ $laporan->dataUmum->merek ?? '-' }}</td>
        </tr>
        <tr>
            <td>Tahun Pembuatan</td>
            <td>{{ $laporan->dataUmum->tahun_pembuatan ?? '-' }}</td>
        </tr>
    </table>

    {{-- III. HASIL PEMERIKSAAN --}}
    <div class="section-title">III. HASIL PEMERIKSAAN</div>
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="45%">Item Pemeriksaan</th>
                <th width="15%">Hasil</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporan->pemeriksaan as $i => $p)
                <tr>
                    <td class="text-center">{{ $i + 1 }}</td>
                    <td>{{ $p->item_pemeriksaan }}</td>
                    <td class="text-center">{{ strtoupper($p->hasil) }}</td>
                    <td>{{ $p->keterangan ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- IV. KESIMPULAN --}}
    <div class="section-title">IV. KESIMPULAN</div>
    <p>
        Berdasarkan hasil pemeriksaan dan pengujian yang telah dilakukan,
        maka pesawat tenaga produksi tersebut dinyatakan:
    </p>
    <p><b>LAIK / TIDAK LAIK</b> untuk dioperasikan.</p>

    {{-- TTD --}}
    <table class="ttd">
        <tr>
            <td>
                Pemeriksa<br><br><br>
                ( _______________________ )
            </td>
            <td>
                Penanggung Jawab<br><br><br>
                ( _______________________ )
            </td>
        </tr>
    </table>

</div>

</body>
</html>
