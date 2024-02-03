<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\profilecontroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [dashboardController::class, 'index'])->name('idea.index');

Route::get('/idea/{idea}', [IdeaController::class, 'show'])->name('idea.show');

Route::get('/idea/{idea}/edit', [IdeaController::class, 'edit'])->name('idea.edit');

Route::put('/idea/{idea}', [IdeaController::class, 'update'])->name('idea.update');

Route::post('/idea', [IdeaController::class, 'store'])->name('idea.store');

Route::delete('/idea/{idae}', [IdeaController::class, 'destroy'])->name('idea.destroy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');
