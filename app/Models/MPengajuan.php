<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MPengajuan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'pengajuan';

    protected $primaryKey = "id_pengajuan";
    protected $fillable = [
        "id_pengajuan",
        'tanggal_pengajuan',
        'berkas_pengajuan',
        'catatan',
        'tanggal_validasi',
        'catatan_validasi',
        'id_informasi',
        'id_registrasi',
        'status_validasi',
    ] ;
    public function registrasi()
    {
        return $this->belongsTo(MRegistrasi::class, 'id_registrasi');
    }
    static function getData(){
        return DB::table('pengajuan');
    }

    

    public static function getById($id_pengajuan){
        return static::find($id_pengajuan);
    }

    public function pelaporan(){
        return $this->hasMany(MPelaporan::class, 'id_pengajuan');
    }
    public function informasi()
    {
        return $this->belongsTo(MBerita::class, 'id_informasi');
    }
}