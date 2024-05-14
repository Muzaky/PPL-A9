<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        'id_users',
        'foto_profil'
    ];
    static function getData()
    {
        return DB::table('registrasi');
    }

    static function getById($id_registrasi)
    {
        return static::find($id_registrasi);
    }
    static function Cid_users()
    {
        if (Auth::check()) {
            return DB::table('registrasi')
                ->where('id_users', Auth::user()->id)
                ->count();
        } else {
            return 0; // Or handle the case where the user is not authenticated
        }
    }

    static function regkec(){
        return DB::table('registrasi')
        ->select(
            'registrasi.id_registrasi', 
            'registrasi.nama_keltani', 
            'registrasi.nama_ketua', 
            'registrasi.luas_hamparan', 
            'registrasi.jumlah_anggota', 
            'registrasi.alamat_keltani', 
            'registrasi.bukti_legalitas', 
            'registrasi.foto_profil', 
            'registrasi.tanggal_validasi', 
            'registrasi.catatan_validasi', 
            'registrasi.status_validasi', 
            'registrasi.created_at', 
            'registrasi.updated_at', 
            'kecamatan.id_kecamatan', 
            'kecamatan.nama_kecamatan', 
            'users.id', 
            'users.email', 
            'users.password'
        )
        ->join('kecamatan', 'registrasi.nama_kecamatan', '=', 'kecamatan.id_kecamatan')
        ->join('users', 'registrasi.id_users', '=', 'users.id')
        ->get();
    }


    static function idusers()
    {
        if (Auth::check()) {
            return DB::table('registrasi')
                ->where('id_users', Auth::user()->id);
        } else {
            return 0; // Or handle the case where the user is not authenticated
        }
    }



    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }


    public static function findByIdWithStatus($id)
    {
        return DB::table('status')
            ->select('users.id', 'reg.status_validasi')
            ->join('registrasi as reg', 'users.id', '=', 'reg.id_users')
            ->where('users.id', $id);
    }

    

    public function pelaporan(){
        return $this->hasMany(MPelaporan::class);
    }

    public function pengajuan(){
        return $this->hasMany(MPengajuan::class,'id_registrasi','id');
    }
}
