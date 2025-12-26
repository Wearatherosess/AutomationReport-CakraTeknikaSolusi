<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| ROUTE BERDASARKAN ID (WAJIB DI ATAS)
|--------------------------------------------------------------------------
*/
Route::get(
    '/laporan/id/{id}/preview',
    [LaporanController::class, 'preview']
);

Route::get(
    '/laporan/id/{id}/pemeriksaan',
    [LaporanController::class, 'formPemeriksaan']
);

Route::post(
    '/laporan/id/{id}/pemeriksaan/store',
    [LaporanController::class, 'storePemeriksaan']
);

Route::get(
    '/laporan/id/{id}/export-pdf',
    [LaporanController::class, 'exportPdf']
);

/*
|--------------------------------------------------------------------------
| MENU LAPORAN
|--------------------------------------------------------------------------
*/
Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/laporan/{bagian}', [LaporanController::class, 'subBagian']);
Route::get('/laporan/{bagian}/{sub}/create', [LaporanController::class, 'create']);
Route::post('/laporan/{bagian}/{sub}/store', [LaporanController::class, 'store']);
