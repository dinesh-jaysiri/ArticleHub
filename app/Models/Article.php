<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'user_id'];
    protected $casts = [
        'body' => 'array'
    ];

    public function setTitleAttribute($value)
    {
        if (empty($this->attributes['slug'])) {
            $slug = $this->generateUniqueSlug($value);
            $this->attributes['slug'] = $slug;
        }

        $this->attributes['title'] = $value;
    }

    private function generateUniqueSlug($value)
    {
        $originalSlug = Str::slug($value);
        $slug = $originalSlug;
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }


    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'article_like', 'article_id', 'user_id');
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'article_topic', 'article_id', 'topic_id');
    }
}