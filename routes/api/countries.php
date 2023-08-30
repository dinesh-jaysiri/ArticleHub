<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;



Route::name('countries.')->group(function () {
    Route::get('/countries', [CountryController::class, 'index'])->name('index');
    Route::get('/countries/{country}', [CountryController::class, 'show'])->name('show');
    Route::post('/countries', [CountryController::class, 'store'])->name('store');
    Route::patch('/countries/{country}', [CountryController::class, 'update'])->name('update');
    Route::delete('/countries/{country}', [CountryController::class, 'destroy'])->name('destroy');
});