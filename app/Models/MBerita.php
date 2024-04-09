<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MBerita extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'informasi';

    protected $primaryKey = "id_informasi";
    protected $fillable = [
        "id_informasi",
        'judul_informasi',
        'nama_bibit',
        'gambar_informasi',
        'tgl_awal',
        'tgl_akhir',
        'jumlah_bibit',
        'syarat_ketentuan',
        'kontak_narahubung',
    ] ;
    static function getData(){
        return DB::table('informasi');
    }

    public static function getById($id_informasi){
        return static::find($id_informasi);
    }
}