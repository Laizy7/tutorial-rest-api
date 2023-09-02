<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/me', [AuthenticationController::class, 'me']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::patch('/posts/{id}', [PostController::class, 'update'])->middleware('owner-post');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('owner-post');

    Route::post('/comment', [CommentController::class, 'store']);
    Route::patch('/comment/{id}', [CommentController::class, 'update'])->middleware('owner-comment');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->middleware('owner-comment');

    Route::get('/users', [UserController::class, 'index']);
    Route::patch('/users/{id}', [UserController::class, 'update']);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);

Route::post('/login', [AuthenticationController::class, 'login']);
