<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'guest'],function(){

    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/register', [AuthController::class, 'store']);

    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/login', [AuthController::class, 'authenticate']);

    Route::get('auth/google',[AuthController::class,'redirectToGoogle'])->name('authViaGoogle');

    Route::get('auth/google/callback',[AuthController::class,'handelGoogleCallback'])->name('handelGoogleAuth');

    Route::get('auth/facebook',[AuthController::class,'redirectToFacebook'])->name('authViFacebook');

    Route::get('auth/facebook/callback',[AuthController::class,'handelFacebookCallback'])->name('handelFacebookAuth');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

