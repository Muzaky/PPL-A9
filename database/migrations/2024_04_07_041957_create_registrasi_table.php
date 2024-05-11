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
        Schema::create('registrasi', function (Blueprint $table) {
            $table->id('id_registrasi');
            $table->string('nama_keltani');
            $table->string('nama_ketua');
            $table->string('luas_hamparan');
            $table->integer('jumlah_anggota');
            $table->string('alamat_keltani');
            $table->string('bukti_legalitas');
            $table->string('foto_profil')->nullable();
            $table->date('tanggal_validasi')->nullable();
            $table->text('catatan_validasi')->nullable();
            $table->foreignId('id_users')->unique();
            $table->string('nama_kecamatan');
            $table->string('status_validasi')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi');
    }
};
