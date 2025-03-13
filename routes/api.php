<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;  // Pastikan ini menggunakan huruf kapital pada "C"
use App\Http\Controllers\bookController;
use App\Http\Controllers\userController;
use App\Http\Controllers\loanController;
use App\Http\Controllers\ReviewController;

// Menggunakan apiResource untuk resource CRUD standar
Route::apiResource('categories', CategoryController::class);
Route::apiResource('books', bookController::class);
Route::apiResource('users', userController::class);
Route::apiResource('loans', loanController::class);
Route::apiResource('reviews', ReviewController::class);

// Route contoh untuk mengambil user yang sudah autentikasi menggunakan Sanctum