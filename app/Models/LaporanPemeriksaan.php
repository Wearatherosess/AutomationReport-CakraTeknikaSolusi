<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPemeriksaan extends Model
{
    protected $table = 'laporan_pemeriksaan';

    protected $fillable = [
        'laporan_id',
        'item_pemeriksaan',
        'hasil',
        'keterangan',
    ];
}
