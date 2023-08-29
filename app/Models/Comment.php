<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Comment extends Model
{
    use HasFactory;

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function scopeTopLevel(Builder $query)
    {
        return $query->whereNull('parent_id');
    }

    public function likes()
    {
        return $this->belongsToMany(User::class,'comment_like', 'comment_id', 'user_id');

    }
}