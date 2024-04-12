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
        'id_users'
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
}
