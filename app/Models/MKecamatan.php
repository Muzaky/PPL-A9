<?php


namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

Class MKecamatan extends Model
{   
    protected $table = 'kecamatan';
    
    use HasFactory;
    
    public function show(){
        return DB::table('kecamatan');
    }
}