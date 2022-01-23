<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersVerification extends Model
{
    use HasFactory;

    public $table = 'users_verification';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
