<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\LaporanPemeriksaan;


class Laporan extends Model
{
    protected $table = 'laporan';

    protected $fillable = [
        'bagian',
        'sub_bagian',
        'nama_perusahaan',
        'lokasi',
        'tanggal_pemeriksaan'
    ];

    public function dataUmum()
    {
        return $this->hasOne(LaporanDataUmum::class);
    }

    public function pemeriksaan()
{
    return $this->hasMany(LaporanPemeriksaan::class);
}

}
