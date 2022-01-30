<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', [HomeController::class, 'home']);

// テーマ追加
Route::post('/theme/add', [ThemeController::class, 'add']);

// 掲示板詳細
Route::get('/post/{id}', [PostController::class, 'post']);

// 掲示板コメント追加
Route::post('/comment/add',[PostController::class, 'add']);
