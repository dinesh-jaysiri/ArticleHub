<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $casts = [
        'body' => 'array'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }

    public function likes(){
        return $this->belongsToMany(User::class,'article_like', 'article_id','user_id');
    }

    public function topics() {
        return $this->belongsToMany(Topic::class, 'article_topic', 'article_id','topic_id');
    }
}