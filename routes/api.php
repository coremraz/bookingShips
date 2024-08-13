<?php

use App\Http\Controllers\Api\RegisteredUserController;
use App\Http\Controllers\api\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);

Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [RegisteredUserController::class, 'login']);
Route::post('/logout', [RegisteredUserController::class, 'logout'])->middleware('auth:sanctum');


