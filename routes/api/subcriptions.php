<?php

use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;

Route::name('subscriptions.')->group(function () {
    Route::get('/subscriptions', [SubscribeController::class, 'index'])->name('index');
    Route::get('/subscriptions/{subscribe}', [SubscribeController::class, 'show'])->name('show');
    Route::post('/subscriptions', [SubscribeController::class, 'store'])->name('store');
    Route::patch('/subscriptions/{subscribe}', [SubscribeController::class, 'update'])->name('update');
    Route::delete('/subscriptions/{subscribe}', [SubscribeController::class, 'destroy'])->name('destroy');
});