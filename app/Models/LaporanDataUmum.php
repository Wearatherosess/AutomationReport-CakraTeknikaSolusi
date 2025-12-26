<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanDataUmum extends Model
{
    protected $table = 'laporan_data_umum';

    protected $fillable = [
        'laporan_id',
        'jenis_mesin',
        'merek',
        'tahun_pembuatan'
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }
}

