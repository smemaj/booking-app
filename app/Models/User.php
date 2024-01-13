<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'user_role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function userLogin()
    {
        return $this->hasOne(UserLogin::class);
    }

    public function userRole()
    {
        return $this->hasOne(UserRole::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function checkAdmin()
    {
        DB::select("call check_admin(".$this->id.", @checking)");
        $check =  DB::select("select @checking as checking");
        $admin = $check[0]->checking;
        return $admin;
    }
}
