<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

    public function informasi(){
        return $this->hasMany(MPengajuan::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = str_replace(' ', '-', $post->judul_informasi);
        });
    }
}