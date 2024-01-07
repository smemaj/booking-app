<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserLogin extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
