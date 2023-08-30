<?php

use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;

Route::name('topics.')->group(function () {
    Route::get('/topics', [TopicController::class, 'index'])->name('index');
    Route::get('/topics/{topic}', [TopicController::class, 'show'])->name('show');
    Route::post('/topics', [TopicController::class, 'store'])->name('store');
    Route::patch('/topics/{topic}', [TopicController::class, 'update'])->name('update');
    Route::delete('/topics/{topic}', [TopicController::class, 'destroy'])->name('destroy');
});

