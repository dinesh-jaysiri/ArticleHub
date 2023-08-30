<?php

use App\Http\Controllers\FollowController;
use Illuminate\Support\Facades\Route;

Route::name('follows.')->group(function () {
    Route::get('/follows', [FollowController::class, 'index'])->name('index');
    Route::get('/follows/{follow}', [FollowController::class, 'show'])->name('show');
    Route::post('/follows', [FollowController::class, 'store'])->name('store');
    Route::patch('/follows/{follow}', [FollowController::class, 'update'])->name('update');
    Route::delete('/follows/{follow}', [FollowController::class, 'destroy'])->name('destroy');
});