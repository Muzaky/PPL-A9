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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->date('tanggal_pengajuan');
            $table->string('berkas_pengajuan');
            $table->text('catatan_validasi')->nullable();
            $table->date('tanggal_validasi')->nullable();
            $table->foreignId('id_informasi');
            $table->foreignId('id_registrasi');
            $table->integer('status_validasi')->default(1);
            $table->timestamps();
            $table->softDeletes();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan');
    }
};
