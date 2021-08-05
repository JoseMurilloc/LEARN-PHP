<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/old/user', function (Request $request) {
    return response()->json(['message' => 'Hello world']);
});

Route::get('/all', function (Request $request) {
    $params = $request->all();
    return response()->json(['params' => $params]);
});

Route::post('/user', [UserController::class, 'store']);
Route::get('/user', [UserController::class, 'index']);

Route::post('posts', [PostController::class, 'create']);
Route::get('post/{id}', [PostController::class, 'show']);
Route::get('posts', [PostController::class, 'index']);
Route::put('posts/{id}', [PostController::class, 'update']);
