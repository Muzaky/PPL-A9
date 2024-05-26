<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MPelaporan extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'pelaporan';

    protected $primaryKey = "id_pelaporan";
    protected $fillable = [
        "id_pelaporan",
        'tanggal_pelaporan',
        'nama_kegiatan',
        'dokumentasi_pelaporan',
        'kondisi',
        'tanggal_validasi',
        'catatan_validasi',
        'id_registrasi',
        'id_pengajuan',
        'status_validasi',

    ];


    static function getData()
    {
        return DB::table('pelaporan');
    }

    public static function getById($id_pelaporan)
    {
        return static::find($id_pelaporan);
    }

    public function pengajuan()
    {
        return $this->belongsTo(MPengajuan::class, 'id_pengajuan');
    }
    public function registrasi()
    {
        return $this->belongsTo(MRegistrasi::class, 'id_registrasi');
    }

    static function getDatas()
    {
        return DB::table('pelaporan')
            ->select(
                'pelaporan.id_pelaporan',
                'pelaporan.tanggal_pelaporan',
                'pelaporan.nama_kegiatan',
                'pelaporan.dokumentasi_pelaporan',
                'pelaporan.kondisi',
                'pelaporan.tanggal_validasi',
                'pelaporan.catatan_validasi',
                'pelaporan.status_validasi',
                'registrasi.nama_keltani'
            )
            ->join('registrasi', 'pelaporan.id_registrasi', '=', 'registrasi.id_registrasi')
            ->join('pengajuan', 'pelaporan.id_pengajuan', '=', 'pengajuan.id_pengajuan');
    }
}
