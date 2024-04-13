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
        'nama_informasi',
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
}