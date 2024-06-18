<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\HogeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// インターフェース
Route::get('/hoge', [HogeController::class, 'show']);

// 全てのユーザー情報を取得するルート
Route::get('/users', [UserController::class, 'index']);

// 特定のユーザー情報を取得するルート
Route::get('/users/{id}', [UserController::class, 'show']);

Route::get('/attack', [GameController::class, 'attack']);

require __DIR__.'/auth.php';
