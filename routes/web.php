<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

/**
 * /
 * /profile
 * /feed
 */

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// refactor routes with route group with prefix ideas 
Route::group(['prefix' => 'ideas', 'as' => 'ideas.'], function () {
    
    Route::post('/', [IdeaController::class, 'store'])->name('create');
    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

    // group with middleware "auth"
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
        Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');
        Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');
        Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
    });
 
});

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/profile/{user}', [UserController::class, 'show'])->name('profile')->middleware('auth');
Route::get('/profile/{user}/edit', [UserController::class, 'edit'])->name('edit')->middleware('auth');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

