<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    // followedUser: Represents the user who is being followed.
    // followingUser: Represents the user who is doing the following.


    public function followingUser(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function followedUser(){
        return $this->belongsTo(User::class, 'followed_id');
    }
}