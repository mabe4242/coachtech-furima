<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;

Route::middleware('auth')->group(function () {
    Route::get('/mypage/profile', [ProfileController::class, 'edit']);
    Route::put('/mypage/profile', [ProfileController::class, 'update']);
});

Route::post('/register', [RegisteredUserController::class, 'store'])->middleware(['guest']);
Route::get('/', [ItemController::class, 'index']);