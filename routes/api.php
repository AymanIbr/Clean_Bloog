<?php

use App\Http\Controllers\Api\postsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('posts',[postsController::class , 'index']);
Route::get('post/{id}',[postsController::class , 'show']);
Route::post('posts',[postsController::class , 'store']);
Route::post('post/{id}',[postsController::class , 'update']);
Route::post('/posts/{id}',[postsController::class , 'destroy']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
