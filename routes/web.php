<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HelloController;
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

//　ユーザ（ユーザ登録していない人も含む）ルーティング

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::prefix('cart')->middleware(['auth:users'])->group(function ()

// index
Route::get('/', [
    UserController::class,
    'index'
])->name('index');

// 小説の詳細
Route::get('/show/{id}', [
    UserController::class,
    'show'
])->name('show');

// 小説を読む
Route::get('/read/{id}', [
    UserController::class,
    'read'
])->name('read');



Route::prefix('writer')->middleware(['auth'])->group(function () {

    Route::get('', [
        UserController::class,
        'write'
    ])->name('write');

    Route::get('edit/{id}', [
        UserController::class,
        'edit'
    ])->name('edit');

    // 追記投稿「ページ推移」
    Route::get('add', [
        UserController::class,
        'add'
    ])->name('writer.add');

    // 追記投稿「ページ推移」
    Route::post('create', [
        UserController::class,
        'create'
    ])->name('writer.create');

    //小説編集
    Route::post('update', [
        UserController::class,
        'editUpdate'
    ])->name('writer/update');

    // ページデリート
    Route::post('delete/page', [
        UserController::class,
        'deletePage'
    ])->name('writer/page/delete');

    // ユーザデリート
    Route::post('delete', [
        UserController::class,
        'deleteUser'
    ])->name('writer/user/delete');
});

//新規投稿
Route::post('user/update', [
    UserController::class,
    'update'
])->name('app2');






//Laravel8からルーティングの描き方が変わっている
Route::get('/hello', [HelloController::class, 'hello']);

Route::get('/hello2', [HelloController::class, 'hello2']);

Route::get('index', [TestController::class, 'index']);

require __DIR__ . '/auth.php';
