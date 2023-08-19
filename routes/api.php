<?php

use App\Http\Controllers\createImageController;
use App\Http\Controllers\getAllImagesController;
use App\Http\Controllers\getImageController;
use Illuminate\Support\Facades\Route;


Route::get('/images',getAllImagesController::class);
Route::get('/images/{name}',getImageController::class);
Route::post('/images/{name}',createImageController::class);

