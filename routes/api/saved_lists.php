<?php

use App\Http\Controllers\SavedListController;
use Illuminate\Support\Facades\Route;

Route::name('saved_lists.')->group(function () {
    Route::get('/saved_lists', [SavedListController::class, 'index'])->name('index');
    Route::get('/saved_lists/{savedList}', [SavedListController::class, 'show'])->name('show');
    Route::post('/saved_lists', [SavedListController::class, 'store'])->name('store');
    Route::patch('/saved_lists/{savedList}', [SavedListController::class, 'update'])->name('update');
    Route::delete('/saved_lists/{savedList}', [SavedListController::class, 'destroy'])->name('destroy');
});
