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
            $table->string('nama_keltani')->nullable();
            $table->string('nama_ketua')->nullable();
            $table->string('luas_hamparan')->nullable();
            $table->integer('jumlah_anggota')->nullable();
            $table->string('alamat_keltani')->nullable();
            $table->string('bukti_legalitas')->nullable();
            $table->date('tanggal_validasi')->nullable();
            $table->string('catatan_validasi')->nullable();
            $table->integer('id_users')->nullable();
            $table->string('nama_kecamatan')->nullable();
            $table->integer('status_validasi')->default(1);
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
