<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\profilecontroller;
use App\Http\Controllers\UserController;
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

Route::get('lang/{lang}', function ($lang) {
    app()->setLocale($lang);
    session()->put('locale', $lang);

    return redirect()->route('ideas.index');
})->name('setLang');

Route::get('/', [dashboardController::class, 'index'])->name('ideas.index');

Route::group(['prefix' => 'ideas/', 'as' => 'ideas.', 'middleware' => 'auth'], function () {
    //     Route::get('{idea}', [IdeaController::class, 'show'])
    //         ->name('show')
    //         ->withoutMiddleware('auth');

    //     Route::get('{idea}/edit', [IdeaController::class, 'edit'])->name('edit');

    //     Route::put('{idea}', [IdeaController::class, 'update'])->name('update');

    //     Route::post('idea', [IdeaController::class, 'store'])
    //         ->name('store')
    //         ->withoutMiddleware('auth');

    // Route::group(['middleware' => 'auth'], function () {
    //     //     Route::delete('{idae}', [IdeaController::class, 'destroy'])->name('destroy');

    //     Route::post('{idea}/comments', [commentController::class, 'store'])->name('comments.store');
    // });
});

Route::resource('ideas', IdeaController::class)
    ->except(['index', 'create', 'show'])
    ->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']); // we do this where we need to detrmine show without auth middleware this two lines of code is replaed than the alot of lines in above

Route::resource('ideas.comments', CommentController::class)
    ->only('store')
    ->middleware('auth'); // this line is the replaced of the above line of code for comments

Route::resource('users', UserController::class)->middleware('auth');

Route::get('profile/{user}', [UserController::class, 'profile'])
    ->name('profile')
    ->middleware('auth');

Route::post('users/{user}/follow', [FollowerController::class, 'follow'])
    ->name('users.follow')
    ->middleware('auth');

Route::post('users/{user}/unfollow', [FollowerController::class, 'unfollow'])
    ->name('users.unfollow')
    ->middleware('auth');

Route::post('idea/{idea}/like', [IdeaLikeController::class, 'like'])
    ->name('idea.like')
    ->middleware('auth');

Route::post('idea/{idea}/unlike', [IdeaLikeController::class, 'unlike'])
    ->name('idea.unlike')
    ->middleware('auth');

// Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware(['auth','admin']);

Route::get('/feed', FeedController::class)
    ->middleware('auth')
    ->name('feed');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');
