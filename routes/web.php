<?php

use App\Http\Controllers\web\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('api/docs', function () {
    return view('docs.index');
});

Route::get('/profile', function () {
    $user = Auth::user();
    return view('profile.index', ['user' => $user]);
})->name('profile');

Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::post('/login', [RegisteredUserController::class, 'login'])->name('login');
