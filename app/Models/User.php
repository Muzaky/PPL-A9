<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $primaryKey = 'id';
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function registrasi()
    {
        return $this->hasOne(MRegistrasi::class, 'id_users', 'id');
    }
    public function kelompoktani()
    {
        return $this->hasOne(MKelompoktani::class);
    }

    public function pengajuan(){
        return $this->hasMany(MPengajuan::class);
    }
    // public function pelaporan(){
    //     return $this->hasMany(MPelaporan::class);
    // }

    public static function createWithLoggedInUser($userData, $loggedInUserId = null)
    {
        // Create a new user instance and set the provided data
        $user = new static();
        $user->fill($userData);

        // If a logged-in user ID is provided, associate it with the created user
        if ($loggedInUserId) {
            $user->created_by = $loggedInUserId;
        }

        // Save the user to the database
        $user->save();

        // Return the created user instance
        return $user;
    }
   

    
}
