<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\profilecontroller;
use GuzzleHttp\Middleware;
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

Route::group(['prefix' => 'idea/', 'as' => 'idea.', 'middleware' => 'auth'], function () {
    Route::get('{idea}', [IdeaController::class, 'show'])
        ->name('show')
        ->withoutMiddleware('auth');

    Route::get('{idea}/edit', [IdeaController::class, 'edit'])->name('edit');

    Route::put('{idea}', [IdeaController::class, 'update'])->name('update');

    Route::post('idea', [IdeaController::class, 'store'])
        ->name('store')
        ->withoutMiddleware('auth');

    Route::group(['middleware' => 'auth'], function () {
        Route::delete('{idae}', [IdeaController::class, 'destroy'])->name('destroy');

        Route::post('{idea}/comments', [commentController::class, 'store'])->name('comments.store');
    });
});

Route::get('/terms', function () {
    return view('terms');
})->name('terms');
