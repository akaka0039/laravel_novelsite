<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;


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

// index
Route::get('/', [
    UserController::class,
    'index'
])->name('user.index');

// 小説の詳細
Route::get('/show/{id}', [
    UserController::class,
    'show'
])->name('user.show');

// 小説を読む
Route::get('/read/{novel_id}/{page}', [
    UserController::class,
    'read'
])->name('user.read');

// 小説を検索する
Route::get('/search/{user_request}', [
    UserController::class,
    'search'
])->name('user.search');

Route::get('/welcome', [
    UserController::class,
    'welcome'
])->name('welcome');


Auth::routes();

require __DIR__ . '/auth.php';
