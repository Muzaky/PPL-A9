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
        'status_validasi',
        'catatan_validasi',
        'keterangan',
    ] ;
    static function getData(){
        return DB::table('pengajuan');
    }
}