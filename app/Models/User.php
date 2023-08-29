<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Follow;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

   


    public function country (){
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function following()
    {
        return $this->hasMany(Follow::class, 'user_id');

    }

    public function followers()
    {
        return $this->hasMany(Follow::class, 'followed_id');

    }

    public function subscribing()
    {
        return $this->hasMany(Subscribe::class, 'user_id');
    }

    public function  subscribers(){
        return $this->hasMany(Subscribe::class, 'subscribed_id');
    }

    // pivot tables
    public function articleLikes()
    {
        return $this->belongsToMany(Article::class, 'article_like', 'user_id', 'article_id');
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'topic_user', 'user_id', 'topic_id');
    }
}