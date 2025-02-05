<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReviewsController;

Route::apiResource('categories', CategoryController::class);


Route::resource('reviews', ReviewsController::class);
