<?php


namespace App\Repositories;

use App\Exceptions\GeneralJsonException;
use App\Models\Article;
use Illuminate\Support\Facades\DB;

class ArticleRepository extends BaseRepository
{

    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {

            $created = Article::query()->create([
                'title' => data_get($attributes, 'title'),
                'body' => data_get($attributes, 'body'),
                'user_id' => 1
            ]);
            throw_if(!$created, GeneralJsonException::class, 'Faild to create article');
            return $created;
        });
    }



    public function update($article, array $attributes)
    {
        return DB::transaction(function () use ($article, $attributes) {
            $updated = $article->update([
                'title' => data_get($attributes, 'title', $article->title),
                'body' => data_get($attributes, 'body', $article->body),
            ]);

            throw_if(!$updated, GeneralJsonException::class, 'Faild to update article');

            return $article;

        });
    }


    public function forceDelete($article)
    {
        return DB::transaction(function () use ($article) {
            $deleted = $article->forceDelete();

            throw_if(!$deleted, GeneralJsonException::class, 'cannot delete article');

            return $deleted;
        });



    }
}