<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\UrlController::class, 'create'])->name('urls.create');
Route::get('/urls', [\App\Http\Controllers\UrlController::class, 'index'])->name('urls.index');
Route::post('/urls/store', [\App\Http\Controllers\UrlController::class, 'store'])->name('urls.store');
