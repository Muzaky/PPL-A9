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
        'tanggal_validasi',
        'catatan_validasi',
        'id_informasi',
        'id_registrasi',
        'status_validasi',
    ] ;
    static function getData(){
        return DB::table('pengajuan');
    }

    

    public static function getById($id_pengajuan){
        return static::find($id_pengajuan);
    }

    public function pelaporan(){
        return $this->hasMany(MPelaporan::class);
    }
    public function registrasi(){
        return $this->hasOne(MRegistrasi::class,'id_registrasi','id');
    }
    public function informasi()
    {
        return $this->belongsTo(MBerita::class, 'id_informasi');
    }
}