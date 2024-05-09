<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MUlasan extends Model{
    
    use HasFactory;

    protected $guarded = [];

    protected $table = 'ulasan';

    protected $primaryKey = "id_ulasan";
    protected $fillable = [
        "id_ulasan",
        'deskripsi',
        'id_registrasi',
    ] ;
    static function getData(){
        return DB::table('ulasan');
    }
    public static function getById($id_ulasan){
        return static::find($id_ulasan);
    }

   static function getDataName(){
    return DB::table('ulasan')
    ->select('ulasan.*', 'registrasi.*', 'registrasi.nama_keltani')
    ->join('registrasi', 'ulasan.id_registrasi', '=', 'registrasi.id_registrasi')
    ->get();
   }
};