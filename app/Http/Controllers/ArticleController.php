<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Repositories\ArticleRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $pageSize = $request->page_size ?? 20;
        $articles = Article::query()->paginate($pageSize);

        return ArticleResource::collection($articles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ArticleRepository $repository)
    {
        $payload = $request->only(['title', 'body']);

        Validator::validate($payload, [
            'title' => 'string|max:255',
            'body' => 'array'
        ]);

        $created = $repository->create($payload);
        return new ArticleResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {

        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article, ArticleRepository $repository)
    {
        $payload = $request->only(['title', 'body']);

        Validator::validate($payload, [
            'title' => 'string|max:255',
            'body' => 'array'
        ]);

        $updated = $repository->update($article, $payload);
        return new ArticleResource($updated);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article,ArticleRepository $repository)
    {
        $article = $repository->forceDelete($article);
        return new JsonResponse([
            'data' => 'success'
        ]);

    }
}