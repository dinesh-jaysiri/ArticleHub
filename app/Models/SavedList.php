<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedList extends Model
{
    use HasFactory;


    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_saved_list', 'saved_list_id', 'article_id');
    }
}