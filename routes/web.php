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
Route::get('/show', [
    UserController::class,
    'show'
])->name('show');

Route::prefix('writer')->middleware(['auth'])->group(function () {

    Route::get('', [
        UserController::class,
        'write'
    ])->name('write');

    Route::post('/update', [
        UserController::class,
        'update'
    ])->name('app2');
});

Route::post('user/update', [
    UserController::class,
    'update'
])->name('app2');






//Laravel8からルーティングの描き方が変わっている
Route::get('/hello', [HelloController::class, 'hello']);

Route::get('/hello2', [HelloController::class, 'hello2']);

Route::get('index', [TestController::class, 'index']);

require __DIR__ . '/auth.php';
