<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::name('articles.')->group(function () {
    Route::get('/articles', [ArticleController::class, 'index'])->name('index');
    Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('show');
    Route::post('/articles', [ArticleController::class, 'store'])->name('store');
    Route::patch('/articles/{article}', [ArticleController::class, 'update'])->name('update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('destroy');
});