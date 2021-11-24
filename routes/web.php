<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [TestController::class, 'index']);

Route::get('/index2', [TestController::class, 'index2']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/batch', [\App\Http\Controllers\BatchController::class, 'index']);

Route::post('/batch', [\App\Http\Controllers\BatchController::class, 'command']);

Route::get('/batch/create', [\App\Http\Controllers\BatchController::class, 'create']);

Route::get('/batch/result', [\App\Http\Controllers\BatchController::class, 'result']);
