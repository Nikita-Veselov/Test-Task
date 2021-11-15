<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_email',
        'message',
        'answered',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_email', 'email');
    }
}
