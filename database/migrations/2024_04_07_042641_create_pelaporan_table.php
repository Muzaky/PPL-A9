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
        Schema::create('pelaporan', function (Blueprint $table) {
            $table->id('id_pelaporan');
            $table->date('tanggal_pelaporan');
            $table->string('nama_kegiatan');
            $table->string('dokumentasi_pelaporan');
            $table->text('kondisi');
            $table->date('tanggal_validasi')->nullable();
            $table->text('catatan_validasi')->nullable();
            $table->foreignId('id_registrasi');
            $table->foreignId('id_pengajuan');
            $table->integer('status_validasi')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelaporan');
    }
};
