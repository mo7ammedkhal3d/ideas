<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','can:admin'])->prefix('/admin')->as('admin.')->group(function(){
    Route::get('/', [AdminDashboardController::class, 'index'])
    ->name('dashboard');

    Route::get('/users', [AdminUserController::class, 'index'])
    ->name('users');
});
