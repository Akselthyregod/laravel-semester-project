<?php

use App\Http\Controllers\TestController;
use App\Models\batch_report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [\App\Http\Controllers\BatchController::class, 'index']);

Route::get('/index2', [TestController::class, 'index2']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/batch', [\App\Http\Controllers\BatchController::class, 'indexBatch']);

Route::get('/batch/{batchID}', [\App\Http\Controllers\BatchController::class, 'indexBatch']);

Route::post('/batch/{batchID}', [\App\Http\Controllers\BatchController::class, 'command'])->name('command');


Route::get('/create', [\App\Http\Controllers\BatchController::class, 'view']);

Route::post('/create', [\App\Http\Controllers\BatchController::class, 'create']);

Route::get('/batch/result', [\App\Http\Controllers\BatchController::class, 'result']);

Route::get('/ingredients', [\App\Http\Controllers\BatchController::class, 'ingredients']);

Route::get('/ingredients/update', [\App\Http\Controllers\BatchController::class, 'notifyNewInventory'])->name('newInventory');

Route::get('/status', [\App\Http\Controllers\BatchController::class, 'notifyNewState'])->name('ajaxStatus');

Route::get('/status/batch', [\App\Http\Controllers\BatchController::class, 'notifyNew'])->name('ajaxNew');


//returns true if the batch is found in reports, which means the batch is completed
Route::get('/status/{batchID}', function (int $batchID){
    $cmd = DB::table('batch_report')->where('batchID', $batchID)->exists();
    if($cmd){
        echo 'report';
        session()->put('current_batchID', $batchID);
    }else{
        echo 'batch';
    }
})->name('batchStatus');


