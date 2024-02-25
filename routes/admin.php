<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\Usercontroller as AdminUsercontroller;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','can:admin'])->prefix('/admin')->as('admin.')->group(function(){
    Route::get('/', [AdminDashboardController::class, 'index'])
    ->name('dashboard');

    Route::resource('users', AdminUsercontroller::class);
});
