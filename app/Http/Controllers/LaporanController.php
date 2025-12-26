<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\LaporanDataUmum;
use App\Models\LaporanPemeriksaan;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    // Halaman utama laporan (5 bagian)
    public function index()
    {
        $bagian = [
            'listrik' => 'Listrik',
            'pesawat-angkat-angkut' => 'Pesawat Angkat dan Angkut',
            'pesawat-tenaga-produksi' => 'Pesawat Tenaga Produksi',
            'pesawat-uap-bejana-tekan' => 'Pesawat Uap Bejana Tekan',
            'proteksi-kebakaran' => 'Proteksi Kebakaran',
        ];

        return view('laporan.index', compact('bagian'));
    }


    // Halaman sub bagian
    public function subBagian($bagian)
    
    {
        $subBagian = [
            'listrik' => [
                'instalasi-listrik' => 'Instalasi Listrik',
                'penyalur-petir' => 'Penyalur Petir',
            ],
            'pesawat-angkat-angkut' => [
                'excavator' => 'Excavator',
                'forklift' => 'Forklift',
                'gondola' => 'Gondola',
                'conveyor' => 'Conveyor',
                'loader' => 'Loader',
                'overhead-crane' => 'Over Head Crane',
            ],
            'pesawat-tenaga-produksi' => [
                'mesin-produksi' => 'Mesin Produksi',
                'penggerak-mula' => 'Penggerak Mula',
            ],
            'pesawat-uap-bejana-tekan' => [
                'air-compressor' => 'Air Compressor',
                'air-dryer' => 'Air Dryer',
                'air-receiver-tank' => 'Air Receiver Tank',
                'boiler' => 'Boiler',
            ],
            'proteksi-kebakaran' => [
                'apar' => 'APAR',
                'fire-alarm' => 'Fire Alarm',
                'hydrant' => 'Hydrant',
                'sprinkler' => 'Sprinkler',
            ],
        ];

        return view('laporan.sub-bagian', [
            'bagian' => $bagian,
            'subBagian' => $subBagian[$bagian] ?? []
        ]);
    }

        // Form input laporan
    public function create($bagian, $sub)
{
    return view('laporan.create', compact('bagian', 'sub'));
}

public function store(Request $request, $bagian, $sub)
{
    $laporan = Laporan::create([
        'bagian' => $bagian,
        'sub_bagian' => $sub,
        'nama_perusahaan' => $request->nama_perusahaan,
        'lokasi' => $request->lokasi,
        'tanggal_pemeriksaan' => now(),
    ]);

    LaporanDataUmum::create([
        'laporan_id' => $laporan->id,
        'jenis_mesin' => $request->jenis_mesin,
        'merek' => $request->merek,
        'tahun_pembuatan' => $request->tahun_pembuatan,
    ]);

    // Redirect ke halaman pemeriksaan setelah menyimpan data umum
    return redirect('/laporan/id/' . $laporan->id . '/pemeriksaan')
        ->with('success', 'Data umum tersimpan, lanjut pemeriksaan');
}


public function preview($id)
{
    $laporan = Laporan::with('dataUmum')->findOrFail($id);

    return view('laporan.preview-mesin-produksi', compact('laporan'));
}

public function storePemeriksaan(Request $request, $id)
{
    // Ambil laporan yang SUDAH ADA
    $laporan = Laporan::findOrFail($id);

    $items = $request->item_pemeriksaan;
    $hasil = $request->hasil;
    $keterangan = $request->keterangan;

    for ($i = 0; $i < count($items); $i++) {
        if (!empty($items[$i])) {
            LaporanPemeriksaan::create([
                'laporan_id' => $laporan->id,
                'item_pemeriksaan' => $items[$i],
                'hasil' => $hasil[$i],
                'keterangan' => $keterangan[$i] ?? null,
            ]);
        }
    }

    return redirect('/laporan/id/' . $laporan->id . '/preview')
    ->with('success', 'Data umum berhasil disimpan. Lanjutkan pemeriksaan.');

}

public function formPemeriksaan($id)
{
    $laporan = Laporan::findOrFail($id);
    return view('laporan.pemeriksaan', compact('laporan'));
}

public function exportPdf($id)
{
    $laporan = Laporan::with(['dataUmum', 'pemeriksaan'])->findOrFail($id);

    $pdf = Pdf::loadView(
        'laporan.pdf-mesin-produksi', // VIEW KHUSUS PDF
        compact('laporan')
    )->setPaper('a4', 'portrait');

    return $pdf->download(
        'Laporan_Mesin_Produksi_' . $laporan->id . '.pdf'
    );
}



}
