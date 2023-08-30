<?php

use App\Http\Controllers\ReadingHistoryController;
use Illuminate\Support\Facades\Route;



Route::name('reading_histories.')->group(function () {
    Route::get('/reading_histories', [ReadingHistoryController::class, 'index'])->name('index');
    Route::get('/reading_histories/{readingHistory}', [ReadingHistoryController::class, 'show'])->name('show');
    Route::post('/reading_histories', [ReadingHistoryController::class, 'store'])->name('store');
    Route::patch('/reading_histories/{readingHistory}', [ReadingHistoryController::class, 'update'])->name('update');
    Route::delete('/reading_histories/{readingHistory}', [ReadingHistoryController::class, 'destroy'])->name('destroy');
});