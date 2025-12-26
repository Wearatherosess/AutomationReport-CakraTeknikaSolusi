<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_data_umum', function (Blueprint $table) {
    $table->id();
    $table->foreignId('laporan_id')
          ->constrained('laporan')
          ->onDelete('cascade');

    $table->string('jenis_mesin');
    $table->string('merek')->nullable();
    $table->year('tahun_pembuatan')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_data_umum');
    }
};
