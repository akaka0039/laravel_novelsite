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

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::prefix('cart')->middleware(['auth:users'])->group(function ()

// index
Route::get('/', [
    UserController::class,
    'index'
])->name('index');

Route::get('/', [
    UserController::class,
    'index'
])->name('index');

Route::get('/writer', function () {
    return view('writer');
})->middleware(['auth'])->name('dashboard');

//Laravel8からルーティングの描き方が変わっている
Route::get('/hello', [HelloController::class, 'hello']);

Route::get('/hello2', [HelloController::class, 'hello2']);

Route::get('index', [TestController::class, 'index']);

require __DIR__ . '/auth.php';
