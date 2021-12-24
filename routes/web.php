<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth', 'blocked']], function () {
    Route::get('/', function () {
        $users = User::all();
        return view('homepage.homepage', compact('users'));
    })->name('homepage');

    Route::post('/block', [UserController::class, 'block'])->name('block');
    Route::post('/unblock', [UserController::class, 'unblock'])->name('unblock');
    Route::post('/delete', [UserController::class, 'delete'])->name('delete');

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');

    Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::fallback(function () {
    abort(404);
});
