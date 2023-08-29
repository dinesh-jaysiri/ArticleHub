<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    public function articles()
    {
        return $this->belongsToMany(Article::class,'article_topic' , 'topic_id', 'article_id');
    }
}
