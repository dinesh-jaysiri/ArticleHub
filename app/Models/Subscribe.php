<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;

    public function subscribingUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subscribedUser()
    {
        return $this->belongsTo(User::class, 'subscribed_id');
    }
}
