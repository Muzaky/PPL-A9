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
        Schema::create('informasi', function (Blueprint $table) {
            $table->id('id_informasi');
            $table->string('judul_informasi');
            $table->string('nama_bibit');
            $table->string('gambar_informasi')->nullable();
            $table->date('tgl_awal');
            $table->date('tgl_akhir');
            $table->integer('jumlah_bibit');
            $table->text('syarat_ketentuan');
            $table->string('kontak_narahubung');
            $table->timestamps();
            $table->softDeletes();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi');
    }
};
