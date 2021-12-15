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

Route::get('/', [\App\Http\Controllers\BatchController::class, 'index']);

Route::get('/index2', [TestController::class, 'index2']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/batch', [\App\Http\Controllers\BatchController::class, 'indexBatch']);

Route::post('/batch', [\App\Http\Controllers\BatchController::class, 'command']);

Route::get('/batch/create', [\App\Http\Controllers\BatchController::class, 'view']);

Route::post('/batch/create', [\App\Http\Controllers\BatchController::class, 'create']);

Route::get('/batch/result', [\App\Http\Controllers\BatchController::class, 'result']);

Route::get('/ingredients', [\App\Http\Controllers\BatchController::class, 'ingredients']);

/*

Route::get('/db_dump', function () {

    //Needed in SQL File:

    //SET GLOBAL sql_mode = '';
    //SET SESSION sql_mode = '';

    $get_all_table_query = "SHOW TABLES";
    $result = DB::select(DB::raw($get_all_table_query));

    $tables = [
        'live_batches',
    ];

    $report = 'batch_report';

    $structure = '';
    $data = '';
    foreach ($tables as $table) {
        $show_table_query = "SHOW CREATE TABLE " . $report . "";

        $show_table_result = DB::select(DB::raw($show_table_query));

        foreach ($show_table_result as $show_table_row) {
            $show_table_row = (array)$show_table_row;
            $structure .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
        }
        $select_query = "SELECT * FROM " . $table;
        $records = DB::select(DB::raw($select_query));

        foreach ($records as $record) {
            $record = (array)$record;
            $table_column_array = array_keys($record);
            foreach ($table_column_array as $key => $name) {
                $table_column_array[$key] = '`' . $table_column_array[$key] . '`';
            }

            $table_value_array = array_values($record);
            $data .= "\nINSERT INTO $table (";

            $data .= "" . implode(", ", $table_column_array) . ") VALUES \n";

            foreach($table_value_array as $key => $record_column)
                $table_value_array[$key] = addslashes($record_column);

            $data .= "('" . implode("','", $table_value_array) . "');\n";
        }
    }
    $file_name = __DIR__ . '/../database/database_backup' . '.sql';
    $file_handle = fopen($file_name, 'w + ');

    $output = $structure . $data;
    fwrite($file_handle, $output);
    fclose($file_handle);
    echo "DB backup ready";
});

*/


