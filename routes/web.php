<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\UrlController::class, 'create']);
Route::get('/urls', [\App\Http\Controllers\UrlController::class, 'index']);
