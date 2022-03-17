<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\WriterController;



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



// 小説の詳細

Route::prefix('writer')->middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->middleware(['writer'])->name('dashboard');

    Route::get('index', [
        WriterController::class,
        'writer'
    ])->name('writer.index');

    Route::get('/show/{id}', [
        WriterController::class,
        'show'
    ])->name('writer.show');

    // 小説を読む
    Route::get('/read/{novel_id}/{page}', [
        WriterController::class,
        'read'
    ])->name('writer.read');

    Route::get('edit/{id}', [
        WriterController::class,
        'edit'
    ])->name('writer.edit');

    // 追記投稿「ページ推移」
    Route::get('add', [
        WriterController::class,
        'add'
    ])->name('writer.add');

    // 追記投稿「ページ推移」
    Route::post('create/add', [
        WriterController::class,
        'create'
    ])->name('writer.create');

    //小説編集
    Route::post('update', [
        WriterController::class,
        'editUpdate'
    ])->name('writer.update');

    // ページデリート
    Route::post('delete/page', [
        WriterController::class,
        'deletePage'
    ])->name('writer.page.delete');

    Route::post('delete/novel', [
        WriterController::class,
        'deleteNovel'
    ])->name('writer.novel.delete');

    // ユーザデリート
    Route::post('delete/user', [
        WriterController::class,
        'deleteUser'
    ])->name('writer.user.delete');

    // 新規投稿

    Route::get('create/novel', [
        WriterController::class,
        'updatePage'
    ])->name('writer.new.site');

    Route::post('create', [
        WriterController::class,
        'update'
    ])->name('writer.new.create');
});

Auth::routes();

require __DIR__ . '/auth.php';
