<?php

use App\Http\Controllers\admin\dashboardController as AdminDashboardController;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth','can:admin'])->prefix('/admin')->as('admin.')->group(function(){
    Route::get('/', [AdminDashboardController::class, 'index'])
    ->name('dashboard');

    Route::get('/', [AdminDashboardController::class, 'index'])
    ->name('dashboard');

});
