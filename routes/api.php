<?php

use App\Http\Controllers\Api\RegisteredSellerController;
use App\Http\Controllers\Api\RegisteredUserController;
use App\Http\Controllers\Api\SellerController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::patch('/users/{id}', [UserController::class, 'update'])->middleware('auth:sanctum');
Route::get('/sellers', [SellerController::class, 'index']);
Route::get('/sellers/{id}', [SellerController::class, 'show']);
Route::patch('/sellers/{id}', [SellerController::class, 'update'])->middleware('auth:sanctum');


//Регистрация юзера
Route::group(['prefix' => 'user'], function () {
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::post('/login', [RegisteredUserController::class, 'login']);
    Route::post('/logout', [RegisteredUserController::class, 'logout'])->middleware('auth:sanctum');
});

//Регистрация селлера
Route::group(['prefix' => 'seller'], function () {
    Route::post('/register', [RegisteredSellerController::class, 'store']);
    Route::post('/login', [RegisteredSellerController::class, 'login']);
    Route::post('/logout', [RegisteredSellerController::class, 'logout'])->middleware('auth:sanctum');
});




