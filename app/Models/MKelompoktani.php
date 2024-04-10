<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MBerita extends Model
{
    use HasFactory, Uuids;

    protected $guarded = [];

    protected $table = 'kelompoktani';

    protected $primaryKey = "id_kelompoktani";
    protected $fillable = [
        "id_kelompoktani",
        'nama_ketua',
        'nama_kelompoktani',
        'kelengkapan_kelompoktani',
        'jumlah_anggota',
        'status_kelompoktani',
    ] ;
    static function getData(){
        return DB::table('kelompoktani');
    }

    static function getSession($id_kelompoktani){
        session(['id_kelompoktani'=> $id_kelompoktani]);
    }
}