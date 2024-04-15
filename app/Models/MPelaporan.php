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


    static function getData(){
        return DB::table('pelaporan');
    }

    public static function getById($id_pelaporan){
        return static::find($id_pelaporan);
    }

    public function pengajuan(){
        return $this->hasOne(MPengajuan::class);
    }
    public function registrasi(){
        return $this->hasOne(MRegistrasi::class);
    }

    public function pelaporan(){
        return $this->belongsTo(MPengajuan::class);
    }
}
