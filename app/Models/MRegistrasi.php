<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MRegistrasi extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'registrasi';

    protected $primaryKey = "id_registrasi";
    protected $fillable = [
        'nama_keltani',
        'nama_ketua',
        'luas_hamparan',
        'jumlah_anggota',
        'alamat_keltani',
        'bukti_legalitas',
        'tanggal_validasi',
        'catatan_validasi',
        'nama_kecamatan',
        'status_validasi',
        'id_users'
    ] ;
    static function getData(){
        return DB::table('registrasi');
    }

    static function getById($id_registrasi){
        return static::find($id_registrasi);
    }

}
